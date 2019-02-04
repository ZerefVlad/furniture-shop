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

Route::get('/', 'MainController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'Admin\UserController@index')->name('user_list');
        Route::get('/create', 'Admin\UserController@userActionCreate')->name('user_action_create');
        Route::get('/edit/{id}/{user_name}', 'Admin\UserController@userActionEdit')->name('user_action_edit');
        Route::get('/create-user', 'Admin\UserController@createUser')->name('user_create');
        Route::get('/edit-user/{id}', 'Admin\UserController@editUser')->name('user_edit');
        Route::get('/delete-user/{id}', 'Admin\UserController@deleteUser')->name('user_action_delete');
        Route::get('/change-role/{id}', 'Admin\UserController@changeRole')->name('user_action_change_role');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'Admin\CategoryController@index')->name('category_list');
        Route::get('/create', 'Admin\CategoryController@categoryActionCreate')->name('category_action_create');
        Route::get('/edit/{id}/{category_name}', 'Admin\CategoryController@categoryActionEdit')->name('category_action_edit');
        Route::post('/create-category', 'Admin\CategoryController@createCategory')->name('category_create');
        Route::post('/edit-category/{id}', 'Admin\CategoryController@editCategory')->name('category_edit');
        Route::get('/delete-category/{id}', 'Admin\CategoryController@deleteCategory')->name('category_action_delete');
    });
    Route::group(['prefix' => 'products'], function () {
       Route::get('/', 'Admin\ProductController@index')->name('product_list');
       Route::get('/{id}', 'Admin\ProductController@editProduct')->name('product_edit');
       Route::post('/{id}/edit', 'Admin\ProductController@editProductAction')->name('product_edit_action');
    });
});

Route::get('/picture-delete', 'Admin\CategoryController@deletePicture');


