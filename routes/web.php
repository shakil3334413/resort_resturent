<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm');
Route::post('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login');
Route::get('admin/register', 'Auth\AdminRegisterController@showRegistrationForm');
Route::post('admin/register', 'Auth\AdminRegisterController@adminregister')->name('admin.register');
// Route::get('admin/dashboard','Backend\HomeController@dashboard')->name('dashboard');

Route::group(['middleware'=>['assign.guard:admin,admin/login']],function(){
    Route::prefix('admin')->group(function () {
        Route::group(['namespace'=>'Backend'],function(){
            // Route::get('room_type','RoomTypeController@index')->name('room_type.index');
            // Route::get('room_type/create','RoomTypeController@create')->name('room_type.create');
            // Route::post('room_type','RoomTypeController@store')->name('room_type.store');
            // Route::get('room_type/edit','RoomTypeController@edit')->name('room_type.edit');
            // Route::put('room_type/{id}','RoomTypeController@index')->name('room_type.update');

            Route::get('dashboard','HomeController@dashboard')->name('dashboard');
            Route::resource('room_type', 'RoomTypeController');
            Route::resource('room', 'RoomController');
            Route::resource('category', 'CategoryController');
            Route::resource('subcategory', 'SubCategoryController');
            Route::resource('brand', 'BrandController');
            Route::resource('item', 'ItemController');
            Route::resource('stock', 'StockController');

            });
        });
    });
