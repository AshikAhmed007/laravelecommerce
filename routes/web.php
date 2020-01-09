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

Route::get('/', 'WelcomeHome@index');
Route::post('/', 'WelcomeHome@index');
Route::get('/category-view/{id}', 'WelcomeHome@category');
Route::get('/contact', 'WelcomeHome@contact');
Route::get('/product-details/{product}', 'WelcomeHome@productDetails');
Route::post('/add-to-cart', 'CartController@addToCart');
Route::get('/show-cart', 'CartController@showCart');
Route::post('/update-cart-product', 'CartController@updateCart');
Route::get('/delete-cart-product/{id}', 'CartController@deleteCart');

Route::get('/checkout', 'CheckoutController@index');
Route::post('/checkout/sign-up', 'CheckoutController@customerRegistration');
Route::get('/checkout/shipping', 'CheckoutController@showShippingInfo');
Route::post('/checkout/save-shipping', 'CheckoutController@saveShippingInfo');
Route::get('/checkout/payment', 'CheckoutController@showPaymentForm');
Route::post('/checkout/save-order', 'CheckoutController@saveOrderInfo');
Route::get('/checkout/my-home', 'CheckoutController@customerHome');
Route::get('/logout', 'CheckoutController@customerLogout');






Auth::routes();
Route::get('/dashboard', 'HomeController@index');

// Category Info
Route::get('/category/add', 'CategoryController@createCategory')->middleware('auth');
Route::post('/category/save', 'CategoryController@storeCategory')->middleware('auth');
Route::get('/category/manage', 'CategoryController@manageCategory')->middleware('auth');
Route::get('/category/edit/{categoryById}', 'CategoryController@editCategory')->middleware('auth');
Route::put('/category/{categoryById}', 'CategoryController@updateCategory')->middleware('auth');
Route::get('/category/delete/{categoryById}', 'CategoryController@deleteCategory')->middleware('auth');


//Manufacturer Info

Route::get('/manufacturer/add', 'ManufacturerController@createManufacturer')->middleware('auth');
Route::post('/manufacturer/save', 'ManufacturerController@storeManufacturer')->middleware('auth');
Route::get('/manufacturer/manage', 'ManufacturerController@manageManufacturer')->middleware('auth');
Route::get('/manufacturer/edit/{manufacturerById}', 'ManufacturerController@editManufacturer')->middleware('auth');
Route::put('/manufacturer/{manufacturerById}', 'ManufacturerController@updateManufacturer')->middleware('auth');
Route::get('/manufacturer/delete/{manufacturerById}', 'ManufacturerController@deleteManufacturer')->middleware('auth');


//Product Info

Route::get('/product/add', 'ProductController@createProduct')->middleware('auth');
Route::post('/product/save', 'ProductController@storeProduct')->middleware('auth');
Route::get('/product/manage', 'ProductController@manageProduct')->middleware('auth');
Route::get('/product/view/{productById}', 'ProductController@viewProduct')->middleware('auth');
Route::get('/product/edit/{productById}', 'ProductController@editProduct')->middleware('auth');
Route::put('/product/{productById}', 'ProductController@updateProduct')->middleware('auth');
Route::get('/product/delete/{productById}', 'ProductController@deleteProduct')->middleware('auth');

