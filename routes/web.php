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
Route::get('/waranty', 'IndexController@waranty')->name('waranty');

Route::group(
	[
        'prefix' => 'cart',
    ],
	function () {
		Route::namespace('Cart')->group(function () {
			Route::get('/', 'CartController@index')->name('cart');
			Route::post('/add', 'CartController@addCart');
			Route::post('/delete', 'CartController@delete');
			Route::post('/all', 'CartController@allCarts');
		});
	}
);


Route::group(
	[
        'prefix' => 'user',
        'middleware' => ['auth', 'can:user-panel'],
    ],
	function () {
		Route::namespace('User')->group(function () {
			Route::get('/', 'UserController@index')->name('user-home');
		});
    	
	}
);

Route::group(
	[
        'prefix' => 'admin',
        'middleware' => ['auth', 'can:admin-panel'],

    ],
	function () {
		Route::group(['prefix' => 'laravel-filemanager'], function () {
	     	\UniSharp\LaravelFilemanager\Lfm::routes();
	 	});
		Route::namespace('Admin')->group(function () {
			Route::get('/', 'AdminController@index')->name('admin-home');
			Route::prefix('category')->group(function () {
				Route::post('/add', 'CategoryController@addCategory');
				Route::post('/{id}/edit', 'CategoryController@editCategory');
				Route::post('/{id}/delete', 'CategoryController@deleteCategory');
			});

			//==================================================================

			Route::prefix('sub_categories')->group(function () {
				Route::post('/add', 'SubCategoryController@addSubCategory');
				Route::post('/{id}/edit', 'SubCategoryController@editCategory');
				Route::post('/{id}/delete', 'SubCategoryController@deleteCategory');
			});

			//==================================================================

			Route::prefix('product')->group(function () {
				Route::post('/add', 'ProductController@addProduct');
				Route::post('/{id}/edit', 'ProductController@editProduct');
				Route::post('/{id}/delete', 'ProductController@index');
			});
		});
    	
	}
);






