<?php
require 'admin.php';
use Illuminate\Support\Facades\Route;
use App\Models\Category;

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
Route::get('/products/details/{id}','App\Http\controllers\ProductController@show')->name('product.details');
Route::get('/','App\Http\controllers\ProductController@index')->name('product.index');
Route::post('/cart/store','App\Http\controllers\CartController@store')->name('addTocart');
Route::get('/get-cart','App\Http\controllers\CartController@getCart');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
