<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::redirect('/admin', 'admin/products');

Route::get('/admin/products', [App\Http\Controllers\AdminController::class, 'showProducts'])->name('admin.showProducts')->middleware('role:superadministrator');
Route::get('/admin/products/add-product', [App\Http\Controllers\AdminController::class, 'addProduct'])->name('admin.addProduct')->middleware('role:superadministrator');
Route::post('/admin/products/add-product/save-product', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store')->middleware('role:superadministrator');

Route::get('/admin/orders', [App\Http\Controllers\AdminController::class, 'showOrders'])->name('admin.showOrders')->middleware('role:superadministrator');
Route::get('/admin/accounts', [App\Http\Controllers\AdminController::class, 'showAccounts'])->name('admin.showAccounts')->middleware('role:superadministrator');

Route::get('/add-to-cart/{product}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add')->middleware('auth');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::get('/cart/destroy/{itemId}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy')->middleware('auth');
Route::get('/cart/update/{itemId}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update')->middleware('auth');
Route::get('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout')->middleware('auth');

Route::post('/order', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store')->middleware('auth');

Route::get('/{user}', [App\Http\Controllers\AdminController::class, 'editUser'])->name('admin.editUser')->middleware('role:superadministrator');
Route::post('/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update')->middleware('role:superadministrator');
Route::post('/{user}/update-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('user.updatePassword')->middleware('role:superadministrator');
Route::get('/products/{product}', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');



