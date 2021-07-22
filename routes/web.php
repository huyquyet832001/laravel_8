<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
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

Route::get('/', function () {
    return view('welcome');
});


Route::group([ // config
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
], function () {
    Route::group(['prefix' => 'users', 'as' => 'users.',], function () {
        Route::get('/', 'UserController@index')->name('index');
        //trả về giao diện thêm mới
        Route::get('create', 'UserController@create')->name('create');
        Route::post('store', 'UserController@store')->name('store');
        Route::get('edit/{id}', 'UserController@edit')->name('edit');
        Route::post('update/{id}', 'UserController@update')->name('update');
        Route::post('delete/{id}', 'UserController@delete')->name('delete');
    });
});
//view trả ra view tương ứng với url
Route::view('/welcome', 'welcome');
/*
-match:mapping url với callback tương ứng,mapping theo nhiều phương thức http đã khai báo
-any: mappping url với callback tương ứng tất cả các phương thức http
*/
//Route Products
Route::prefix('admin')->as('admin.')->namespace('Admin')->group(function () {
    Route::prefix('products')->as('products.')->group(function () {
        Route::get('/', 'ProductsController@index')->name('index');
        Route::get('create', 'ProductsController@create')->name('create');
        Route::post('store', 'ProductsController@store')->name('store');
        Route::get('edit/{id}', 'ProductsController@edit')->name('edit');
        Route::post('update/{id}', 'ProductsController@update')->name('update');
        Route::post('delete/{id}', 'ProductsController@delete')->name('delete');
    });
});







//Route Category

Route::prefix('admin')->as('admin.')->namespace('Admin')->group(function () {
    Route::prefix('categories')->as('categories.')->group(function () {
        Route::get('index', 'CategoryController@index')->name('index');
        Route::get('create', 'CategoryController@create')->name('create');
        Route::post('store', 'CategoryController@store')->name('store');
        Route::get('edit/{id}', 'CategoryController@edit')->name('edit');
        Route::post('update/{id}', 'CategoryController@update')->name('update');
        Route::post('delete/{id}', 'CategoryController@delete')->name('delete');
    });
});
