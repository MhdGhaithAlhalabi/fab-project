<?php

use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\AttributeController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ImportProductsController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UsersController;
use Illuminate\Support\Facades\Route;

Route::group([
    //'middleware' => ['auth:admin,web'],
    'middleware' => ['auth:admin'],
    'as' => 'dashboard.',
    'prefix' => 'admin/dashboard',
    //'namespace' => 'App\Http\Controllers\Dashboard',
], function () {

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('setting', [SettingController::class, 'edit'])->name('setting.edit');
    Route::patch('setting/{setting}', [SettingController::class, 'update'])->name('setting.update');

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');



    // Route::get('/categories/{category}', [CategoriesController::class, 'show'])
    //     ->name('categories.show')
    //     ->where('category', '\d+');

    Route::get('/categories/trash', [CategoriesController::class, 'trash'])
        ->name('categories.trash');
    Route::put('categories/{category}/restore', [CategoriesController::class, 'restore'])
        ->name('categories.restore');
    Route::delete('categories/{category}/force-delete', [CategoriesController::class, 'forceDelete'])
        ->name('categories.force-delete');

    Route::get('/products/trash', [ProductsController::class, 'trash'])
        ->name('products.trash');
    Route::put('products/{product}/restore', [ProductsController::class, 'restore'])
        ->name('products.restore');
    Route::delete('products/{product}/force-delete', [ProductsController::class, 'forceDelete'])
        ->name('products.force-delete');
    Route::post('storeattribute/{product}', [ProductsController::class, 'streAttributes'])
        ->name('products.storeAttributes');
        Route::get('createattributes/{product}', [ProductsController::class, 'createAttributes'])
        ->name('products.createAttributes');


    //Route::resource('/categories', CategoriesController::class);
    //Route::resource('/products', ProductsController::class);

    Route::get('products/import', [ImportProductsController::class, 'create'])
        ->name('products.import');
    Route::post('products/import', [ImportProductsController::class, 'store']);

    Route::resources([
        'products' => ProductsController::class,
        // 'attributes' => AttributeController::class,
        'categories' => CategoriesController::class,
        'roles' => RolesController::class,
        'users' => UsersController::class,
        'admins' => AdminsController::class,
    ]);
});

// Route::middleware('auth')->as('dashboard.')->prefix('dashboard')->group(function() {

// });


