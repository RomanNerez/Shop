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
		Route::namespace('Admin')->group(function () {
			// dashboard
			Route::get('/', 'AdminController@index')->name('admin-home');
			// all categories
			Route::prefix('categories')->group(function () {
				Route::get('/', 'CategoryController@index')->name('admin-categories');
				// add category
				Route::get('/add', 'CategoryController@displayAddCategory')->name('display-add-category');
				Route::post('/add', 'CategoryController@addCategory')->name('add-category');
				// edit category
				Route::get('/{id}/edit', 'CategoryController@displayEditCategory')->name('display-edit-category');
				Route::post('/{id}/edit', 'CategoryController@editCategory')->name('edit-category');
				// delete category
				Route::get('/{id}/delete', 'CategoryController@deleteCategory')->name('delete-category');
			});

			//==================================================================

			Route::prefix('sub_categories')->group(function () {
				Route::get('/', 'SubCategoryController@index')->name('admin-sub_categories');
				// add category
				Route::get('/add', 'SubCategoryController@displayAddCategory')->name('display-add-sub_category');
				Route::post('/add', 'SubCategoryController@addSubCategory')->name('add-sub_category');
				// edit category
				Route::get('/{id}/edit', 'SubCategoryController@displayEditCategory')->name('display-edit-sub_category');
				Route::post('/{id}/edit', 'SubCategoryController@editCategory')->name('edit-sub_category');
				// delete category
				Route::get('/{id}/delete', 'SubCategoryController@deleteCategory')->name('delete-sub_category');
			});

			//==================================================================

			Route::prefix('product')->group(function () {
				// all product
				Route::get('/', 'ProductController@index')->name('admin-product');
				// add product
				Route::get('/add', 'ProductController@displayAddProduct')->name('admin-product-add');
				Route::post('/add', 'ProductController@addProduct');
				// edit product
				Route::get('/{id}/edit', 'ProductController@dispalyEditProduct');
				Route::post('/{id}/edit', 'ProductController@editProduct');
				// delete product
				Route::post('/{id}/delete', 'ProductController@index');
			});
		});
    	
	}
);






