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
# belajar hello world
/*Route::get('/', function () {
    return 'Hello World';
});*/

Route::get('/', function () {
	return view('auth.login');
});

#mengautentikasi email dan password
Auth::routes();

#jika lolos akan ke home karena indexnya disini
Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard',function(){
	return view ('layouts.master');
});

Route::group(['middleware'=>'auth'],function(){
	Route::resource('Category','CategoryController');
	Route::get('/apiCategories','CategoryController@apiCategories')->name('api.categories');
	Route::get('/exportexcelcategories','CategoryController@exportExcel')->name('exportexcel.categoriesall');
	Route::get('/exportpdfcategories','CategoryController@exportpdf')->name('exportpdf.categoriesall');
	Route::post('/importcategories','CategoryController@importexcel')->name('import.categories');

	Route::resource('Customer','CustomerController');
	Route::get('/apiCustomers','CustomerController@apiCustomers')->name('api.customers');
	Route::get('/exportexcelcustomers','CustomerController@exportExcel')->name('exportexcel.customersall');
	Route::get('/exportpdfcustomers','CustomerController@exportpdf')->name('exportpdf.customersall');
	Route::post('/importcustomers','CustomerController@importexcel')->name('import.customers');

	Route::resource('Supplier','SupplierController');
	Route::get('/apiSuppliers','SupplierController@apiSuppliers')->name('api.suppliers');
	Route::get('/exportexcelsuppliers','SupplierController@exportExcel')->name('exportexcel.suppliersall');
	Route::get('/exportpdfsuppliers','SupplierController@exportpdf')->name('exportpdf.suppliersall');
	Route::post('/importsuppliers','SupplierController@importexcel')->name('import.suppliers');

	Route::resource('Product','ProductController');
	Route::get('/apiProducts','ProductController@apiProducts')->name('api.products');
	Route::get('/exportexcelproducts','ProductController@exportExcel')->name('exportexcel.productsall');
	Route::get('/exportpdfproducts','ProductController@exportpdf')->name('exportpdf.productsall');
	Route::post('/importproducts','ProductController@importexcel')->name('import.products');

	Route::resource('Sale','SaleController');
	Route::get('/apiSale','SaleController@apiSales')->name('api.sales');
	Route::get('/exportexcelsales','SaleController@exportExcel')->name('exportexcel.salesall');
	Route::get('/exportpdfsales','SaleController@exportpdf')->name('exportpdf.salesall');
	Route::post('/importsales','SaleController@importexcel')->name('import.sales');

	Route::resource('ProductKeluar','ProductKeluarController');
	Route::get('/apiProductKeluars','ProductKeluarController@apiProductKeluars')->name('api.productkeluars');
	Route::get('/exportexcelproductkeluar','ProductKeluarController@exportExcel')->name('exportexcel.produkkeluarsall');
	Route::get('/exportpdfproductkeluar','ProductKeluarController@exportpdf')->name('exportpdf.produk_keluarsall');
	Route::get('/invoiceprodukkeluar/{id}','ProductKeluarController@exportpdfinvoice')->name('exportpdf.invoiceprodukkeluar');

	Route::resource('ProductMasuk','ProductMasukController');
	Route::get('/apiProductMasuks','ProductMasukController@apiProductMasuk')->name('api.productmasuks');
	Route::get('/exportexcelproductmasuk','ProductMasukController@exportExcel')->name('exportexcel.produk_masuksall');
	Route::get('/exportpdfproductmasuk','ProductMasukController@exportpdf')->name('exportpdf.produk_masukall');
	Route::get('/invoiceprodukmasuk/{id}','ProductMasukController@exportpdfinvoice')->name('exportpdf.invoiceprodukmasuk');
});