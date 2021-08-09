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

Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

Route::get('register', [\App\Http\Controllers\Frontend\LoginController::class, 'register'])->name('register');
Route::post('register', [\App\Http\Controllers\Frontend\LoginController::class, 'doRegister']);

Route::get('login', [\App\Http\Controllers\Backend\LoginController::class, 'login'])->name('login');
Route::post('login', [\App\Http\Controllers\Backend\LoginController::class, 'doLogin']);

//card
Route::get('add/cart/{id}',[\App\Http\Controllers\Frontend\CartController::class,'addToCart'])->name('add.cart');
Route::get('cart/',[\App\Http\Controllers\Frontend\CartController::class,'showCart'])->name('show.cart');

Route::middleware('auth')->group(function () {

    Route::get('order',[\App\Http\Controllers\Frontend\OrderController::class,'order'])->name('order');
    Route::post('order',[\App\Http\Controllers\Frontend\OrderController::class,'orderSubmit']);

    Route::get('profile',[\App\Http\Controllers\Frontend\LoginController::class,'profile'])->name('profile');

    Route::post('profile',[\App\Http\Controllers\Frontend\LoginController::class,'profileEdit']);

    Route::get('logout', [\App\Http\Controllers\Backend\LoginController::class, 'logout'])->name('logout');

    Route::prefix('admin')->group(function () {


        Route::middleware('isAdmin')->group(function () {


            Route::get('/dashboard', [\App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('admin.dashboard');

            Route::get('/products', [\App\Http\Controllers\Backend\ProductController::class, 'index'])->name('admin.product');

            Route::get('/products/create', [\App\Http\Controllers\Backend\ProductController::class, 'create'])->name('admin.product.create');

            Route::post('/products/create', [\App\Http\Controllers\Backend\ProductController::class, 'store']);

            Route::get('/products/edit/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'edit'])->name('admin.product.edit');

            Route::post('/products/edit/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'update']);

            Route::get('/products/delete/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'delete'])->name('admin.product.delete');

            Route::get('/users', [\App\Http\Controllers\Backend\UserController::class, 'index'])->name('admin.user');

            Route::get('/users/create', [\App\Http\Controllers\Backend\UserController::class, 'create'])->name('admin.user.create');

            Route::post('/users/create', [\App\Http\Controllers\Backend\UserController::class, 'store']);

            Route::get('/users/edit/{id}', [\App\Http\Controllers\Backend\UserController::class, 'edit'])->name('admin.user.edit');

            Route::post('/users/edit/{id}', [\App\Http\Controllers\Backend\UserController::class, 'update']);

            Route::get('/users/delete/{id}', [\App\Http\Controllers\Backend\UserController::class, 'delete'])->name('admin.user.delete');
        });
    });
});

