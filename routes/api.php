<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/attributes', 'Admin\AttributeController@getAttributes');
Route::get('/products', 'Admin\ProductController@getProductsForRelated');
Route::any('/update-product-picture', 'Admin\ProductController@updateImageData');
Route::any('/delete-product-picture', 'Admin\ProductController@deleteImageData');
Route::any('/update-product-attribute', 'Admin\ProductController@updateAttributeData');
Route::any('/delete-product-attribute', 'Admin\ProductController@deleteAttributeData');
Route::any('/update-product-related', 'Admin\ProductController@updateRelateProductData');
Route::any('/delete-product-related', 'Admin\ProductController@deleteRelateProductData');
Route::group(['prefix' => 'cart'], function () {
    Route::get('/add', 'CartController@addProduct');
    Route::get('/delete', 'CartController@deleteProduct');
    Route::get('/update-quantity', 'CartController@updateProductQuantity');
    Route::get('/add-complex', 'CartController@addComplexPack');
    Route::get('/delete-complex', 'CartController@deleteComplexPack');
    Route::get('/update-complex-quantity', 'CartController@updateComplexQuantity');
    Route::get('/total', 'CartController@getTotal');
});