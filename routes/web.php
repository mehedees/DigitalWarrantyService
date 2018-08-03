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

Route::get('/', function (){
    return view('welcome');
})->name('welcome');

Route::post('/publicSearch', 'PublicController@publicSearch')->name('publicSearch');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    //Record Purchase
    Route::get('/{product_id}/recordPurchase', 'HomeController@recordPurchaseView')->name('recordPurchase');
    Route::post('/{product_id}/recordPurchase', 'HomeController@recordPurchase');

    //Replace Product
    Route::get('/{history_id}replaceProduct', 'HomeController@replaceProductView')->name('replaceProduct');
    Route::post('/{history_id}replaceProduct', 'HomeController@replaceProduct');

    //search uid
    Route::post('/searchHistory', 'HomeController@searchHistory')->name('searchHistory');

    Route::post('/addProduct', 'HomeController@addProduct')->name('addProduct');

    Route::post('/getProduct', 'HomeController@getProduct')->name('getProduct');

    //Route::post('/recordPurchase', 'HomeController@recordPurchase')->name('recordPurchase');
});

