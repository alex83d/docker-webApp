<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::get('/good{id}', [App\Http\Controllers\GoodController::class, 'good'])->name('good');
Route::get('/category/{id}', [App\Http\Controllers\GoodController::class, 'category'])->name('category');
Route::get('/order/buy/{id}', [OrderController::class, 'buy'])->name('buy');
Route::get('/order/current', [OrderController::class, 'current'])->name('order.current');
Route::delete('order/current/delete', [OrderController::class, 'current'])->name('order.current');
Route::get('/order/process', [OrderController::class, 'process'])->name('order.process');


Route::group(['middleware' => \App\Http\Middleware\AdminMiddleware::class], function () {
    Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
});

// navbar navigation
Route::get('/home', [FrontController::class, 'home'])->name('home');
Route::get('/order', [FrontController::class, 'order'])->name('order');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/news', [FrontController::class, 'news'])->name('news');
