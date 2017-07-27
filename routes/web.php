<?php

/*มาถึง load view "/" ขึ้นหน้าแรก
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('/profile', function () {
    return view('profile',[
    	'name'=>'Napaporn',
    	'age'=>'20',
    	'books'=>[
    		[
    			'book_id'=>'001',
    			'book_name'=>'cartoon'

    		],
    		[
    			'book_id'=>'002',
    			'book_name'=>'action'
    		],
    		[
    			'book_id'=>'003',
    			'book_name'=>'drama'
    		],
    		[
    			'book_id'=>'04',
    			'book_name'=>'oo'
    		],
    		[
    			'book_id'=>'05',
    			'book_name'=>'qq'
    		]

    	]
    	]);
});*/

Route::resource('/', 'HomeController');
Route::resource('/po', 'PoController');
Route::resource('/invoice', 'InvoiceController');
Route::resource('/quotation', 'QuotationController');
Route::resource('/customer', 'CustomerController');
Route::resource('/product', 'ProductController');
Route::resource('/taxreport', 'TaxreportController');
// Route::resource('/login', 'AuthLoginController');
Route::resource('/vendor', 'VendorController');
Route::resource('/supplier', 'SupplierController');
Route::resource('/service', 'ServiceController');
Route::resource('/contact', 'ContactController');

Route::get('logout', 'Auth\logoutController@getLogout');
Auth::routes();















Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
