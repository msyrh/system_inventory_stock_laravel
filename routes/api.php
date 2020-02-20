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
/*Route::get('categories','CategoryController@index');
Route::post('categories','CategoryController@create');
Route::put('/categories/{id}','CategoryController@update');
Route::delete('/categories/{id}','CategoryController@destroy');
Route::get('apicategories','CategoryController@apiCategories');
Route::get('/apiCategories','CategoryController@apiCategories')->name('api.categories');
Route::get('customer','CustomerController@index');
Route::get('sup','SupplierController@index');*/
// Route::get('product','ProductController@index');
Route::get('/apiProduct','ProductController@apiProducts');
Route::put('/apiProductu','ProductController@update');
// Route::post('product','ProductController@store');
// Route::post('categories','CategoryController@store');
// Route::get('/apiSales','SaleController@apiSales');
// Route::get('prodk','ProductKeluarController@apiProductKeluars');
// Route::post('productk','ProductKeluarController@store');
// Route::get('prodm','ProductMasukController@index');
// Route::get('prodapi','ProductMasukController@apiProductMasuk');
// Route::post('prodapim','ProductMasukController@store');
// Route::get('/exp','CategoryController@exportExcel')->name('exportExcel.categoriesAll');
// Route::get('/exppdf','CategoryController@exportpdf')->name('exportpdf.categoriesAll');
