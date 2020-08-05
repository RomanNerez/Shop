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
Auth::routes();


Route::get('/', 'IndexController@index')->name('index');

Route::get('/category/{category}', 'IndexController@productList')->name('product-list');
Route::get('/product/{slug}', 'IndexController@producting')->name('producting');
Route::get('/category/{category}/subcatedory/{subcategory}', 'IndexController@products')->name('products');
Route::get('/about', 'IndexController@about')->name('about');
Route::get('/blog', 'IndexController@blog')->name('blog');
Route::get('/contacts', 'IndexController@contacts')->name('contacts');
Route::get('/cart', 'IndexController@cart')->name('cart');
Route::get('/waranty', 'IndexController@waranty')->name('waranty');


Route::get('/home', 'HomeController@index')->name('home');



