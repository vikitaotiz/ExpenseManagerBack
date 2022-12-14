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
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\OptionalInputController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\PaymentModesController;
use App\Http\Controllers\MaterialCategoriesController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\TagsController;

Route::group(['prefix' => 'v1'], function(){ 
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::group(['middleware' => ['auth:sanctum']], function(){ 
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        
        Route::resource('roles', RolesController::class);
        Route::resource('companies', CompaniesController::class);
        Route::get('/company_entries', [CompaniesController::class, 'company_entries']);
        Route::resource('parts', PartsController::class);
        Route::resource('categories', CategoriesController::class);
        Route::resource('units', UnitsController::class);
        Route::resource('products', ProductsController::class);
        Route::resource('entries', EntriesController::class);
        Route::post('/get_sales', [EntriesController::class, 'get_sales']);
        Route::get('/today_entries/{slug}', [EntriesController::class, 'today_entries']);
        Route::resource('users', UsersController::class);
        Route::resource('stats', StatsController::class);
        Route::resource('stores', StoresController::class);
        Route::resource('optional_inputs', OptionalInputController::class);
        Route::resource('ingredients', IngredientsController::class);

        Route::post('/entries_report', [ReportsController::class, 'entries']);
        Route::post('/purchases_report', [ReportsController::class, 'purchases']);
        
        Route::get('/company_charts', [ReportsController::class, 'company_charts']);
        Route::get('/entries_last_seven_days', [ReportsController::class, 'entriesLastSevenDays']);
        Route::get('/entries_last_seven_days', [ReportsController::class, 'entriesLastSevenDays']);
        Route::get('/sales_categories', [ReportsController::class, 'sales_categories']);
        
        Route::post('/product_closing_stock', [ProductsController::class, 'product_closing_stock']);

        Route::resource('purchases', PurchasesController::class);
        Route::get('/today_purchases', [PurchasesController::class, 'today_purchases']);
        Route::get('/all_purchases', [PurchasesController::class, 'all_purchases']);

        Route::resource('payment_modes', PaymentModesController::class);
        Route::resource('material_categories', MaterialCategoriesController::class);
        Route::resource('suppliers', SuppliersController::class);
        Route::resource('accounts', AccountsController::class);
        
        Route::resource('tags', TagsController::class);
    });
});



 


