<?php

use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

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

Auth::routes(['verify' => true]);

Route::group([
        'middleware' => ['auth'],
        'prefix'     => 'laravel-filemanager'
    ],
    function () {
        Lfm::routes();
    }
);

Route::group([
        'middleware' => ['auth', 'can:admin-panel'],
        'prefix'     => '/home'
    ],
    function () {
        Route::namespace('Cabinet\Admin')->group(function () {
            Route::get('/', 'IndexController@index')->name('admin-cabinet');

            Route::group(['prefix' => '/category'], function () {
                Route::post('/delete', 'CategoryController@delete');
                Route::post('/create', 'CategoryController@create');
                Route::post('/edit',   'CategoryController@edit');
                Route::post('/copy',   'CategoryController@copy');
            });

            Route::group(['prefix' => '/groups'], function () {
                Route::post('/delete', 'GroupsController@delete');
                Route::post('/create', 'GroupsController@create');
                Route::post('/sort',   'GroupsController@sort');
                Route::post('/edit',   'GroupsController@edit');
                Route::post('/copy',   'GroupsController@copy');
            });

            Route::group(['prefix' => '/subs'], function () {
                Route::post('/delete', 'SubsController@delete');
                Route::post('/create', 'SubsController@create');
                Route::post('/edit',   'SubsController@edit');
                Route::post('/copy',   'SubsController@copy');
            });

            Route::group(['prefix' => '/collection'], function () {
                Route::post('/delete', 'CollectionController@delete');
                Route::post('/create', 'CollectionController@create');
                Route::post('/edit',   'CollectionController@edit');
                Route::post('/copy',   'CollectionController@copy');
            });

            Route::group(['prefix' => '/attribute'], function () {
                Route::post('/delete', 'AttributeController@delete');
                Route::post('/create', 'AttributeController@create');
                Route::post('/sort',   'AttributeController@sort');
                Route::post('/edit',   'AttributeController@edit');
            });

            Route::group(['prefix' => '/attribute-list'], function () {
                Route::post('/delete', 'AttrListController@delete');
                Route::post('/create', 'AttrListController@create');
                Route::post('/edit',   'AttrListController@edit');
                Route::post('/copy',   'AttrListController@copy');
            });

            Route::group(['prefix' => '/currency'], function () {
                Route::post('/delete', 'CurrencyController@delete');
                Route::post('/create', 'CurrencyController@create');
                Route::post('/edit',   'CurrencyController@edit');
                Route::post('/update', 'CurrencyController@update');
            });

            Route::group(['prefix' => '/products'], function () {
                Route::post('/delete', 'ProductsController@delete');
                Route::post('/create', 'ProductsController@create');
                Route::post('/edit',   'ProductsController@edit');
                Route::post('/copy',   'ProductsController@copy');
                Route::post('/related','ProductsController@related');
                Route::get('/search',  'ProductsController@search');
            });

            Route::group(['prefix' => '/menu-area-visibility'], function () {
                Route::post('/delete', 'MenuAreaVisibilitiesController@delete');
                Route::post('/edit',   'MenuAreaVisibilitiesController@edit');
                Route::post('/add',   'MenuAreaVisibilitiesController@add');
            });

            Route::group(['prefix' => '/arbitrary-links'], function () {
                Route::post('/delete', 'ArbitraryLinksController@delete');
                Route::post('/edit',   'ArbitraryLinksController@edit');
                Route::post('/create',   'ArbitraryLinksController@create');
            });

            Route::group(['prefix' => '/menu'], function () {
                Route::post('/create', 'MenuController@create');
                Route::post('/update', 'MenuController@update');
            });

            Route::group(['prefix' => '/article'], function () {
                Route::post('/delete', 'ArticleController@delete');
                Route::post('/create', 'ArticleController@create');
                Route::post('/edit',   'ArticleController@edit');
                Route::post('/copy',   'ArticleController@copy');
            });

            Route::group(['prefix' => '/page'], function () {
                Route::post('/edit', 'PagesController@edit');
            });

            Route::group(['prefix' => '/options'], function () {
                Route::post('/update', 'OptionsController@update');
            });
        });
    }
);

foreach(['', '{locale?}'] as $prefix) {
    Route::group([
            'prefix'     => $prefix,
            'where'      => ['locale' => '('. env('APP_LOCALE_LIST') .')'],
            'middleware' => ['localization', 'currency']
        ],
        function () {
            Route::namespace('Publicly')->group(function () {
                Route::get('/',      'PagesController@home')->name('index');
                Route::get('search', 'SearchController@index');

                Route::group([
                    'prefix' => '/services',
                ],
                    function () {
                        Route::get('/',         'PagesController@services');
                        Route::get('/vinyls',   'PagesController@serviceVinyls');
                        Route::get('/standing', 'PagesController@serviceStanding');
                    }
                );

                Route::group([
                        'prefix' => '{catalog}/{category}',
                        'where'  => [
                            'catalog' => '(catalog|services)',
                            'group'   => '(group)',
                            'params'  => '.*'
                        ]
                    ],
                    function () {
                        Route::get('{group?}/{params?}',              'CatalogController@index');
                        Route::get('{collection}/{group?}/{params?}', 'CatalogController@index');
                    }
                );

                Route::group([
                        'prefix' => '{product}/{id}',
                        'where'  => [
                            'product'   => '(product|service)',
                            'option'    => '(option)',
                            'attribute' => '.*'
                        ]
                    ],
                    function () {
                        Route::get('{option?}/{attribute?}', 'ProductController@index');
                        Route::post('related',               'ProductController@related');
                        Route::post('review',                'ProductController@review');
                        Route::post('fast_order',            'ProductController@fastOrder');
                    }
                );

                Route::group([
                        'prefix' => 'cart'
                    ],
                    function () {
                        Route::get('/',         'CartController@index');
                        Route::post('add',      'CartController@add');
                        Route::post('update',   'CartController@update');
                        Route::post('remove',   'CartController@remove');
                        Route::post('bulk_add', 'CartController@bulkAdd');
                    }
                );
                Route::group([
                        'prefix' => 'favorites'
                    ],
                    function () {
                        Route::get('/',       'FavoritesController@index');
                        Route::post('add',    'FavoritesController@add');
                        Route::post('remove', 'FavoritesController@remove');
                    }
                );
                Route::group([
                        'prefix' => 'compare'
                    ],
                    function () {
                        Route::get('/',       'CompareController@index');
                        Route::post('add',    'CompareController@add');
                        Route::post('remove', 'CompareController@remove');
                    }
                );
                Route::group([
                        'prefix' => 'articles/{category}',
                        'where'  => [
                            'rubric' => '(rubric)',
                            'params' => '.*'
                        ]
                    ],
                    function () {
                        Route::get('{rubric?}/{params?}', 'ArticlesController@index');
                    }
                );
                Route::get('article/{article}', 'ArticleController@index');

                Route::get('delivery',       'PagesController@delivery');
                Route::get('contacts',       'PagesController@contacts');
                Route::get('calculator',     'PagesController@calculator');
                Route::get('units',          'PagesController@units');
                Route::get('returns',        'PagesController@returns');
                Route::get('certificates',   'PagesController@certificates');
                Route::get('partnership',    'PagesController@partnership');
                Route::get('privacy-policy', 'PagesController@privacyPolicy');
                Route::get('measuring',      'PagesController@measuring');

                Route::group([
                    'prefix' => 'get-data',
                ],
                    function () {
                        Route::get('special-offers', 'ActionController@getSpecialOffers');
                    }
                );
            });
            Route::group([
                    'middleware' => ['auth', 'verified'],
                    'prefix'     => '/user'
                ],
                function () {
                    Route::namespace('Cabinet\User')->group(function () {
                        Route::get('/', 'IndexController@index')->name('user-cabinet');
                    });
                }
            );
        }
    );
}
unset($prefix);

Route::group([
        'prefix' => 'action'
    ],
    function () {
        Route::namespace('Publicly')->group(function () {
            Route::get('currency/{code}', 'ActionController@currency');
        });
    }
);
