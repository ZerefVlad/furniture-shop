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