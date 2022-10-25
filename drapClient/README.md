## Create project from scratch / WebHooks Client
composer create-project laravel/laravel wbeHookClient
composer require laravel/ui
php artisan ui:auth
php artisan ui bootstrap 
php artisan ui bootstrap --auth

composer require spatie/laravel-webhook-client
php artisan vendor:publish --provider="Spatie\WebhookClient\WebhookClientServiceProvider" --tag="webhook-client-config"
php artisan vendor:publish --provider="Spatie\WebhookClient\WebhookClientServiceProvider" --tag="webhook-client-migrations"
creta php artisan make:model Job\WebHookhandler
creta php artisan make:model webhook_calls
php artisan migrate

creta WEBHOOK_CLIENT_SECRET en el .env
edit config\webhook-client.php, switch for ==>>'process_webhook_job' => App\Models\Job\ProcessWebhookJob::class,
add route: Route::webhooks('webhook-receiving-url'); in routes\web.php
add route: protected $except = ['webhook-receiving-url',]; in app\Http\Middleware\VerifyCsrfToken.php

php artisan key:generate
npm install
npm run dev
php artisan serve --port=8000

## Install 
composer install
npm run dev
php artisan serve --port=8000

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
