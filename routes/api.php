<?php

use App\Http\Controllers\v1\ClientController;
use App\Http\Controllers\v1\SecteurController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function(){

    Route::post('/authenticate', [Controller::class,'authenticate'])->name('login.api');

    Route::middleware('auth:api')->group(function () {

        Route::post('/register', [Controller::class,'register'])->name('register.api');

        Route::prefix('secteur')->group(function(){
            Route::controller(SecteurController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::put('/', 'update');
                Route::post('/', 'store');
                Route::delete('/{id}', 'destroy');
            });
        });

        Route::prefix('client')->group(function(){
            Route::controller(ClientController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::put('/', 'update');
                Route::post('/', 'store');
                Route::delete('/{id}', 'destroy');
            });
        });

    });
});
