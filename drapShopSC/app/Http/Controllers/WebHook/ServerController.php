<?php

namespace App\Http\Controllers\WebHook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\WebhookServer\WebhookCall;
use App\Models\assign_weebhook;

class ServerController extends Controller
{
    public function index($key, $data, $rs) {
        logger($data);
        WebhookCall::create()
        ->url($rs["WEBHOOK_CLIENT_URL"])
        ->payload([$key => $data])
        ->useSecret($rs["WEBHOOK_CLIENT_SECRET"])
        ->dispatch();
    }

    public function list() {
        $data = assign_weebhook::all();
        return view('list', compact('data'));
    }

    public function shows() {
        return view('form');
    }

    public function create(Request $request) {
        $data = [
            "name" => $request->name,
            "type" => $request->type,
            "status" => 1
        ];        
        $r = assign_weebhook::create($data);
        $data["id"] = $r->id;
        $rs =[
            "WEBHOOK_CLIENT_SECRET" => env('WEBHOOK_CLIENT_SECRET_CLIENT'),
            "WEBHOOK_CLIENT_URL" => env('WEBHOOK_CLIENT_SECRET_CLIENT_URL'),
        ];
        $this->index("drapshopSC", $data,$rs);
        return view('form');
    }
}

