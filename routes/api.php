<?php

use App\Http\Controllers\v1\ClientController;
use App\Http\Controllers\v1\SecteurController;
use App\Http\Controllers\v1\CollectController;
use App\Http\Controllers\v1\CollecteurController;
use App\Http\Controllers\v1\CommentaireController;
use App\Http\Controllers\v1\DemandeController;
use App\Http\Controllers\v1\MediaController;
use App\Http\Controllers\v1\PermissionController;
use App\Http\Controllers\v1\PublicationController;
use App\Http\Controllers\v1\RamassageController;
use App\Http\Controllers\v1\Role_permissionController;
use App\Http\Controllers\v1\RoleController;
use App\Http\Controllers\v1\Type_dechetController;
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

        Route::prefix('collecteur')->group(function(){
            Route::controller(CollecteurController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::put('/', 'update');
                Route::post('/', 'store');
                Route::delete('/{id}', 'destroy');
            });
        });

        Route::prefix('collect')->group(function(){
            Route::controller(CollectController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::put('/', 'update');
                Route::post('/', 'store');
                Route::delete('/{id}', 'destroy');
            });
        });

        Route::prefix('commentaire')->group(function(){
            Route::controller(CommentaireController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::put('/', 'update');
                Route::post('/', 'store');
                Route::delete('/{id}', 'destroy');
            });
        });

        Route::prefix('commune')->group(function(){
            Route::controller(CommuneController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::put('/', 'update');
                Route::post('/', 'store');
                Route::delete('/{id}', 'destroy');
            });
        });

        Route::prefix('demande')->group(function(){
            Route::controller(DemandeController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::put('/', 'update');
                Route::post('/', 'store');
                Route::delete('/{id}', 'destroy');
            });
        });

        Route::prefix('media')->group(function(){
            Route::controller(MediaController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::put('/', 'update');
                Route::post('/', 'store');
                Route::delete('/{id}', 'destroy');
            });
        });

        Route::prefix('permission')->group(function(){
            Route::controller(PermissionController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::put('/', 'update');
                Route::post('/', 'store');
                Route::delete('/{id}', 'destroy');
            });
        });

        Route::prefix('publication')->group(function(){
            Route::controller(PublicationController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::put('/', 'update');
                Route::post('/', 'store');
                Route::delete('/{id}', 'destroy');
            });
        });

        Route::prefix('ramassage')->group(function(){
            Route::controller(RamassageController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::put('/', 'update');
                Route::post('/', 'store');
                Route::delete('/{id}', 'destroy');
            });
        });

        Route::prefix('role_permission')->group(function(){
            Route::controller(Role_permissionController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::put('/', 'update');
                Route::post('/', 'store');
                Route::delete('/{id}', 'destroy');
            });
        });

        Route::prefix('role')->group(function(){
            Route::controller(RoleController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::put('/', 'update');
                Route::post('/', 'store');
                Route::delete('/{id}', 'destroy');
            });
        });

        Route::prefix('type_dechet')->group(function(){
            Route::controller(Type_dechetController::class)->group(function () {
                Route::get('/', 'index');
                Route::get('/{id}', 'show');
                Route::put('/', 'update');
                Route::post('/', 'store');
                Route::delete('/{id}', 'destroy');
            });
        });

    });
});
