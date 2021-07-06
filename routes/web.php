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
    return view('test');
});


Route::get('admin/dashboard', [\App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('admin/products', [\App\Http\Controllers\Backend\ProductController::class, 'index'])->name('admin.product');

Route::get('admin/products/create', [\App\Http\Controllers\Backend\ProductController::class, 'create'])->name('admin.product.create');

Route::post('admin/products/create', [\App\Http\Controllers\Backend\ProductController::class, 'store']);

Route::get('admin/products/edit/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'edit'])->name('admin.product.edit');

Route::post('admin/products/edit/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'update']);

Route::get('admin/products/delete/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'delete'])->name('admin.product.delete');

Route::get('admin/users',[\App\Http\Controllers\Backend\UserController::class,'index'])->name('admin.user');

Route::get('admin/users/create',[\App\Http\Controllers\Backend\UserController::class,'create'])->name('admin.user.create');

Route::post('admin/users/create',[\App\Http\Controllers\Backend\UserController::class,'store']);

Route::get('admin/users/edit/{id}',[\App\Http\Controllers\Backend\UserController::class,'edit'])->name('admin.user.edit');

Route::post('admin/users/edit/{id}',[\App\Http\Controllers\Backend\UserController::class,'update']);

Route::get('admin/users/delete/{id}',[\App\Http\Controllers\Backend\UserController::class,'delete'])->name('admin.user.delete');

