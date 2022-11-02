<?php

namespace App\Http\Controllers\WebHook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\WebhookServer\WebhookCall;
use App\Models\assign_weebhook;

class ServerController extends Controller
{

    public function list() {
        $data = assign_weebhook::all();
        return view('list', compact('data'));
    }

    public function shows() {
        return view('form');
    }

    public function create(Request $request) {
        $userAgent = $request->header('user-agent');
        $data = [
            "name" => $request->name,
            "type" => $request->type,
            "status" => 1
        ];        
        $r = assign_weebhook::create($data);
        
        $config = [
            "WEBHOOK_CLIENT_SECRET" => env('WEBHOOK_CLIENT_SECRET_CLIENT'),
            "WEBHOOK_CLIENT_URL" => env('WEBHOOK_CLIENT_SECRET_CLIENT_URL'),
            "typeApp" => "customer",
            "eventType" => "create_order",
            "userAgent" => $userAgent,
            "Authorization" => "Bearer token-demo-123"
        ];
        $metadata = [
            "storeId" => "a0bbe024-e6e1-38a3-90e0-81f9826e2449",
            "applicationId" => "7fb26116-585f-4496-8432-d1a6b99b4f68",            
            "resourceId" => "bf9f1d81-f213-496e-a026-91b6af44996c",
            "payload" => (object) $data,
            "resourceHref" => "https://{{public-api-url}}/v1/orders/bf9f1d81-f213-496e-a026-91b6af44996c",
        ];
        $d = [
            "eventId" => $r->id,
            "eventTime" => date("Y-m-d H:i:s"),
            "eventType" => "create_order",
            "metadata" => (object) $metadata            
        ];

        $this->curlWebHookNative($d, $config);
        // $this->webHookLib($d, $config);        
        return view('form');
    }

    public function curlWebHookNative($d, $config) {
        $r = $this->WebHookTypeApp($d, $config);
        
        // public function curlWebHookNative(Request $request, $config) {        
        // https://webhook.site/#!/b8e2b18c-dfc4-4e26-8d66-dafb5417dff0/ae9bb6a4-4202-40a0-b254-ca1bbf6da1db/1
        // $url = 'https://webhook.site/b8e2b18c-dfc4-4e26-8d66-dafb5417dff0';
        $url = $config["WEBHOOK_CLIENT_URL"];
        $data = [
            "msj" => $r,
            "eventId" => $d['eventId'],
            "eventTime" => $d['eventTime'],
            "eventType" => $d['eventType'],
            "metadata" => $d['metadata'],
        ];
        $json_array = json_encode($data);
        $signature = hash_hmac('sha256', $json_array, $config["WEBHOOK_CLIENT_SECRET"]);
        $curl = curl_init();
        $headers = [
            'Signature:'. $signature,
            'Content-Type: application/json',
            'Authorization:'. $config["Authorization"],
            'User-Agent:'.$config["userAgent"]
        ];
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_array);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        // if ($http_code >= 200 && $http_code < 300) {
        //     echo "webhook send successfully.";
        // } else {
        //     echo "webhook failed.";
        // }
    }

    public function webHookLib($data, $config) {
        $this->WebHookTypeApp($data, $config);
        WebhookCall::create()
        // ->url($config["WEBHOOK_CLIENT_URL"])
        ->url('https://webhook.site/b8e2b18c-dfc4-4e26-8d66-dafb5417dff0')
        ->withHeaders([
            'User-Agent' => $config["userAgent"],
            'Authorization' => $config["Authorization"],
            'Content-Type' => 'application/json'
        ])        
        ->meta($data)
        // ->payload([$config["typeApp"] => $data])
        ->payload($data)
        ->useSecret($config["WEBHOOK_CLIENT_SECRET"])
        ->dispatch();
    }

    public function WebHookTypeApp($data, $config) {
        $typeApp = $config["typeApp"];
        $typeEvent = $config["eventType"];
        switch ($typeApp) {
            case 'customer':
                return $this->WebHookEventCustomer($typeEvent);
                break;
            case 'partner':
                return $this->WebHookEventPartner($typeEvent);
                break;
            case 'driver':
                return $this->WebHookEventDriver($typeEvent);
                break;
        }
    }

    public function WebHookEventCustomer($typeEvent) {
        switch ($typeEvent) {
            case 'orders.create':
                // Order Creation
                //     Endpoint
                //         Payload body will contain the new order details
                //         DO NOT send X-Event-Id header
                //         Endpoint: POST /v1/orders
                //         Scope: orders.create
                //         Documentation: https://developer-guides.tryotter.com/api-reference/#operation/createOrder
                //         Example https://docs.google.com/document/d/13onQ8UcCUsGHrtYKRmReOyomXnNRg9nhAKWjwxfJs-c/edit#heading=h.rh4y3jd9u4ep
                
                return "funciona";
                break;
            
            case 'orders.update':
                // Order Update
                //     Endpoint
                //         Payload body will contain the updated order details
                //         DO NOT send X-Event-Id header
                //         Endpoint: PUT /v1/orders/{orderId}
                //         Scope: orders.update
                //         Documentation: https://developer-guides.tryotter.com/api-reference/#operation/updateOrder
                //         Example https://docs.google.com/document/d/13onQ8UcCUsGHrtYKRmReOyomXnNRg9nhAKWjwxfJs-c/edit#heading=h.yamkn5yg1gyg
                return "funciona";
                break;     

            case 'orders.cancel_order':
                // Order Cancelation
                //     Webhook
                //         Payload body will contain order identifiers and cancelation reason
                //         Provides eventId header to be used in callback
                //         Webhook Event Type:  orders.cancel_order
                //         Documentation: https://developer-guides.tryotter.com/api-reference/#operation/intentToCancelOrderWebhook
                //         Example https://docs.google.com/document/d/13onQ8UcCUsGHrtYKRmReOyomXnNRg9nhAKWjwxfJs-c/edit#heading=h.2xsww0i19rn3
                return "funciona";
                break;                                                         
        }
    }

    public function WebHookEventPartner($typeEvent) {
        switch ($typeEvent) {
            case 'aceptar_order':
                # code...
                // este lo envia otter
                break;
            
            case 'orders.cancel_order':
                // Order Cancelation
                //     Webhook
                //         Payload body will contain order identifiers and cancelation reason
                //         Provides eventId header to be used in callback
                //         Webhook Event Type:  orders.cancel_order
                //         Documentation: https://developer-guides.tryotter.com/api-reference/#operation/intentToCancelOrderWebhook
                //         Example https://docs.google.com/document/d/13onQ8UcCUsGHrtYKRmReOyomXnNRg9nhAKWjwxfJs-c/edit#heading=h.2xsww0i19rn3
                break;
                            
            case 'partner_status':
                # code...
                break;   

            case 'partner_schedule':
                # code...
                break;  
                
            case ' menus.send_menu':
                // Send Menu
                //     Webhook
                //         Payload body will be empty
                //         Provides eventId header to be used in callback
                //         Webhook Event Type:  menus.send_menu
                //         Documentation: https://developer-guides.tryotter.com/api-reference/#operation/sendMenuWebhook
                //         Example https://docs.google.com/document/d/13onQ8UcCUsGHrtYKRmReOyomXnNRg9nhAKWjwxfJs-c/edit#heading=h.40t9yb1cd06w           
                break; 

            case 'edit_menu':
                # code...
                break;

            case 'delete_menu':
                # code...
                break;

            case 'status_menu':
                # code...
                break; 
            case 'cupon_menu':
                # code...
                break;                                                               
        }
    }

    public function WebHookEventDriver($typeEvent) {
        switch ($typeEvent) {
            case 'aceptar_order':
                # code...
                break;
            
            case 'declinar_order':
                # code...
                break;
        }
    }     
}
