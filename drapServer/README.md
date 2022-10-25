## Create project from scratch / WebHooks Server
composer create-project laravel/laravel wbeHookClient
composer require laravel/ui
php artisan ui:auth
php artisan ui bootstrap 
php artisan ui bootstrap --auth

composer require spatie/laravel-webhook-server
php artisan vendor:publish --provider="Spatie\WebhookServer\WebhookServerServiceProvider"

php artisan make:controller WebHook/ServerController --resource
php artisan make:model assign_weebhook --migration

## Note
you must create a crud in the WebHook/ServerController

php artisan migrate

creta WEBHOOK_CLIENT_SECRET en el .env
php artisan key:generate
npm install
npm run dev
php artisan serve --port=8080

## Install 
composer install
npm run dev
php artisan serve --port=8080

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
