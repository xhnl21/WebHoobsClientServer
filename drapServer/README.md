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

config access database in .env
create WEBHOOK_CLIENT_SECRET_CLIENT in .env
create WEBHOOK_CLIENT_SECRET_SC in .env
php artisan migrate
php artisan key:generate
npm install
npm run dev
php artisan serve --port=8080

## Install 
composer install
npm install
npm run dev
php artisan serve --port=8080

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
