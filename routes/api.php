<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\PartsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\EntriesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\SpilagesController;
use App\Http\Controllers\ReportsController;

Route::group(['prefix' => 'v1'], function(){ 
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::group(['middleware' => ['auth:sanctum']], function(){ 
        Route::post('logout', [AuthController::class, 'logout']);
        Route::resource('roles', RolesController::class);
        Route::resource('companies', CompaniesController::class);
        Route::get('company_entries', [CompaniesController::class, 'company_entries']);
        Route::resource('parts', PartsController::class);
        Route::resource('categories', CategoriesController::class);
        Route::resource('units', UnitsController::class);
        Route::resource('products', ProductsController::class);
        Route::resource('entries', EntriesController::class);
        Route::get('today_entries/{slug}', [EntriesController::class, 'today_entries']);
        Route::resource('/users', UsersController::class);
        Route::resource('/stats', StatsController::class);
        Route::resource('/stores', StoresController::class);
        Route::resource('/spilages', SpilagesController::class);

        Route::post('/entries_report', [ReportsController::class, 'entries']);
    });
});



 


