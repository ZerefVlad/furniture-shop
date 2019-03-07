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
Route::group(['prefix' => 'category'], function () {
    Route::get('/{category}', 'CategoryController@showProducts')->name('show_product');
    Route::get('/{category}/{product}', 'ProductController@showSingeProduct')->name('show_single_product');
});

Route::group(['prefix' => 'cart'], function () {
    Route::get('/', 'CartController@openCart')->name('open_cart');
    Route::get('/add/{product}', 'CartController@addProduct')->name('add_to_cart');
});

Route::get('/category', 'CategoryController@index');

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

    Route::group(['prefix' => 'post'], function () {
        Route::get('/', 'Admin\PostController@index')->name('post_list');
        Route::get('/create', 'Admin\PostController@postActionCreate')->name('post_action_create');
        Route::get('/edit/{id}/{post_name}', 'Admin\PostController@postActionEdit')->name('post_action_edit');
        Route::post('/create-post', 'Admin\PostController@createPost')->name('post_create');
        Route::post('/edit-post/{id}', 'Admin\PostController@editPost')->name('post_edit');
        Route::get('/delete-post/{id}', 'Admin\PostController@deletePost')->name('post_action_delete');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'Admin\ProductController@index')->name('product_list');
        Route::get('/create', 'Admin\ProductController@createProduct')->name('create_product');
        Route::post('/create-action', 'Admin\ProductController@createProductAction')->name('product_create_action');
        Route::get('/{product}', 'Admin\ProductController@editProduct')->name('product_edit');
        Route::post('/{product}/edit', 'Admin\ProductController@editProductAction')->name('product_edit_action');
    });

    Route::group(['prefix' => 'attribute'], function () {
        Route::get('/', 'Admin\AttributeController@index')->name('attribute_list');
        Route::get('/create', 'Admin\AttributeController@attributeActionCreate')->name('attribute_action_create');
        Route::get('/edit/{id}/{attribute_name}', 'Admin\AttributeController@attributeActionUpdate')->name('attribute_action_edit');
        Route::post('/create-attribute', 'Admin\AttributeController@createAttribute')->name('attribute_create');
        Route::post('/edit-post/{id}', 'Admin\AttributeController@editAttribute')->name('attribute_edit');
        Route::get('/delete-post/{id}', 'Admin\AttributeController@deleteAttribute')->name('attribute_action_delete');
    });

    Route::get('/orders', 'Admin\OrderController@showOrders')->name('order_list');
    Route::get('/order/{id}', 'Admin\OrderController@showOrder')->name('single_order');

});

Route::get('/picture-delete', 'Admin\CategoryController@deletePicture');


Route::get('/submit-order', 'CartController@submitOrder')->name('submit_order');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
