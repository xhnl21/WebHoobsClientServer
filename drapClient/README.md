## Create project from scratch / WebHooks Client
composer create-project laravel/laravel wbeHookClient
composer require laravel/ui
php artisan ui:auth
php artisan ui bootstrap 
php artisan ui bootstrap --auth

composer require spatie/laravel-webhook-client
php artisan vendor:publish --provider="Spatie\WebhookClient\WebhookClientServiceProvider" --tag="webhook-client-config"
php artisan vendor:publish --provider="Spatie\WebhookClient\WebhookClientServiceProvider" --tag="webhook-client-migrations"
create php artisan make:model Job\ProcessWebhookJob

edit config\webhook-client.php, switch for ==>>'process_webhook_job' => App\Models\Job\ProcessWebhookJob::class,
add route: Route::webhooks('webhook-client-url'); in routes\web.php
add route: protected $except = ['webhook-client-url',]; in app\Http\Middleware\VerifyCsrfToken.php

config access database in .env
create WEBHOOK_CLIENT_SECRET in .env
php artisan migrate
php artisan key:generate
npm install
npm run dev
php artisan serve --port=8000

## Install 
composer install
npm install
npm run dev
php artisan serve --port=8000

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
