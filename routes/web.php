<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);

Route::middleware(['2fa','auth','verified'])->group(function () {

    Route::get('/dashboard', function () {return inertia('Modules/Dashboard/Index'); })->name('dashboard');
    Route::resource('/profile', App\Http\Controllers\User\ProfileController::class);

    Route::resource('/customers', App\Http\Controllers\CustomerController::class);

    Route::prefix('services')->group(function(){
        Route::resource('/testservices', App\Http\Controllers\Services\TestserviceController::class);
        Route::resource('/packages', App\Http\Controllers\Services\PackageController::class);
    }); 
    
    Route::prefix('lists')->group(function(){
        Route::resource('/laboratories', App\Http\Controllers\Lists\LaboratoryController::class);
        Route::resource('/locations', App\Http\Controllers\Lists\LocationController::class);
        Route::resource('/dropdowns', App\Http\Controllers\Lists\DropdownController::class);
    }); 
});

require __DIR__.'/auth.php';
require __DIR__.'/utility.php';
