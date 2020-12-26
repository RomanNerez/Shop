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
Auth::routes(['verify'=>true]);


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
        'middleware' => ['auth', 'verified', 'can:user-panel'],
    ],
	function () {
		Route::namespace('User')->group(function () {
			Route::get('/', 'UserController@index')->name('user');
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
			Route::get('/', 'IndexController@index')->name('admin');
			Route::prefix('category')->group(function () {
				Route::post('/add', 'CategoryController@addCategory');
				Route::post('/edit', 'CategoryController@editCategory');
				Route::post('/delete', 'CategoryController@deleteCategory');
				Route::post('/active', 'CategoryController@activeCategory');
				Route::post('/getdata', 'CategoryController@getCategories');
				Route::post('/getalldata', 'CategoryController@getAllCategories');
			});

			//==================================================================

			Route::prefix('sub-categories')->group(function () {
				Route::post('/add', 'SubCategoryController@addSubCategory');
				Route::post('/edit', 'SubCategoryController@editSubCategory');
				Route::post('/delete', 'SubCategoryController@deleteSubCategory');
				Route::post('/active', 'SubCategoryController@activeSubCategory');
				Route::post('/getdata', 'SubCategoryController@getSubCategories');
				Route::post('/getalldata', 'SubCategoryController@getAllSubCategories');
			});

			//==================================================================

			Route::prefix('product')->group(function () {
				Route::post('/add', 'ProductController@addProduct');
				Route::post('/edit', 'ProductController@editProduct');
				Route::post('/delete', 'ProductController@deleteProduct');
				Route::post('/active', 'ProductController@activeProduct');
				Route::post('/getdata', 'ProductController@getProduct');
			});

			Route::prefix('/menu-area-visibility')->group(function () {
				Route::post('/add', 'MenuAreaVisibilityController@add');
				Route::post('/edit', 'MenuAreaVisibilityController@edit');
				Route::post('/delete', 'MenuAreaVisibilityController@delete');
			});
		});
    	
	}
);






