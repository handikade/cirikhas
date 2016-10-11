<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('shop.index');
});

Route::get('admin/dashboard', 'PagesController@admin');

Route::resource('admin/brand', 'BrandController');
Route::resource('admin/voucher', 'VoucherController');

Route::resource('admin/bank', 'BankController');
Route::resource('admin/ekspedisi', 'EkspedisiController');
Route::resource('admin/paket', 'PaketController');
