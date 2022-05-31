<?php

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

Route::post('/authenticate', [Controller::class,'authenticate'])->name('login.api');
Route::post('/register', [Controller::class,'register'])->name('register.api');

Route::middleware('auth:api')->group(function () {
    Route::prefix('secteur')->group(function(){
        Route::get('/',[SecteurController::class, 'index']);
        Route::get('/{id}',[SecteurController::class, 'show']);
        Route::put('/', [SecteurController::class, 'update']);
        Route::post('/', [SecteurController::class, 'store']);
        Route::delete('/{id}', [SecteurController::class, 'destroy']);
    });
});
