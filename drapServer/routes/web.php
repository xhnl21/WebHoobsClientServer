<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/webhooklist', [App\Http\Controllers\WebHook\ServerController::class, 'list'])->name('list');
Route::get('/shows', [App\Http\Controllers\WebHook\ServerController::class, 'shows'])->name('shows');
Route::post('/form', [App\Http\Controllers\WebHook\ServerController::class, 'create'])->name('create');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
