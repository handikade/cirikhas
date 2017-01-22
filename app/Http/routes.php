<?php

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
  //----------------------------------------
  // Admin Route
  //----------------------------------------
  Route::get('dashboard', 'AdminController@dashboard');
  Route::resource('admin', 'AdminController');

  //----------------------------------------
  // Bank Route
  //----------------------------------------
  Route::resource('bank', 'BankController');

  //----------------------------------------
  // Brand Route
  //----------------------------------------
  Route::resource('brand', 'BrandController');

  //----------------------------------------
  // Voucher Route
  //----------------------------------------
  Route::resource('voucher', 'VoucherController');

  //----------------------------------------
  // Kategori Route
  //----------------------------------------
  Route::resource('kategori', 'KategoriController');

  //----------------------------------------
  // Slider Route
  //----------------------------------------
  Route::get('slider', 'SliderController@index');
  Route::post('slider', 'SliderController@store');
  Route::delete('slider/{slider}', 'SliderController@destroy');

  //----------------------------------------
  // Ekspedisi Route
  //----------------------------------------
  Route::resource('ekspedisi', 'EkspedisiController');
  Route::resource('paket', 'PaketController');

  //----------------------------------------
  // Produk Route
  //----------------------------------------
  Route::resource('produk', 'ProdukController');
  Route::get('produk/{produk}/stok/', 'ProdukController@stok');

  //----------------------------------------
  // Produk Route
  //----------------------------------------
  Route::resource('stok', 'StokController');

  //----------------------------------------
  // Order Route
  //----------------------------------------
  Route::resource('order', 'OrderController', ['except' => ['store']]);
});

Route::get('/', 'PagesController@home');
Route::get('produk/{produk}', 'PagesController@produk');


//----------------------------------------
// Admin Auth Route
//----------------------------------------
Route::get('admin/login', 'Admin\AuthController@getLogin');
Route::get('admin/logout', 'Admin\AuthController@logout');
Route::post('admin/login', 'Admin\AuthController@postLogin');

//----------------------------------------
// User Auth Route
//----------------------------------------
Route::auth();

//----------------------------------------
// Facebook Auth Route
//----------------------------------------
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::resource('cart', 'CartController');

Route::group(['middleware' => 'auth'], function() {
  Route::get('checkout', 'PagesController@checkout');
  Route::post('order', 'OrderController@store');
});
