<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', [App\Http\Controllers\Api\IndexController::class, 'user']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('01101011 01110010 01100001 01100100')->group(function(){
        Route::get('/locations/{type}', [App\Http\Controllers\Api\IndexController::class, 'locations']);
        Route::get('/lists/{type}', [App\Http\Controllers\Api\IndexController::class, 'lists']);
        Route::get('/laboratories/{type}', [App\Http\Controllers\Api\IndexController::class, 'laboratories']);

        Route::prefix('services')->group(function(){
            Route::get('/names', [App\Http\Controllers\Api\TestserviceController::class, 'names']);
            Route::get('/methods', [App\Http\Controllers\Api\TestserviceController::class, 'methods']);
            Route::get('/testservices', [App\Http\Controllers\Api\TestserviceController::class, 'testservices']);
            Route::post('/testservices', [App\Http\Controllers\Api\TestserviceController::class, 'store']);
        }); 

        Route::prefix('search')->group(function(){
            Route::get('/names', [App\Http\Controllers\Api\TestserviceController::class, 'list_names']);
            Route::get('/methods', [App\Http\Controllers\Api\TestserviceController::class, 'list_methods']);
        }); 

        Route::prefix('store')->group(function(){
            Route::post('/names', [App\Http\Controllers\Api\TestserviceController::class, 'store_names']);
            Route::post('/methods', [App\Http\Controllers\Api\TestserviceController::class, 'store_methods']);
            Route::post('/testservices', [App\Http\Controllers\Api\TestserviceController::class, 'store_testservices']);
        });

        Route::prefix('customers')->group(function(){
            Route::get('/names', [App\Http\Controllers\Api\CustomerController::class, 'names']);
            Route::get('/{code}', [App\Http\Controllers\Api\CustomerController::class, 'customers']);
            Route::post('/', [App\Http\Controllers\Api\CustomerController::class, 'store']);
        });
    });
});

