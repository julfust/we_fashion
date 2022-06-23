<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
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

Route::resource('admin/products', ProductController::class)->middleware('auth');

Route::get('admin/products/{id}', [ ProductController::class, 'show' ])->where(['id' => '[0-9]+'])->middleware('auth');

Route::get( '/', [ FrontController::class, 'index' ] );

Route::get('product/{id}', [ FrontController::class, 'show' ])->where(['id' => '[0-9]+']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
