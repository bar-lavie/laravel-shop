<?php

// Shop
Route::get('shop', 'ShopController@categories');
Route::get('shop/search', 'ShopController@search');
Route::get('shop/search/results', 'ShopController@searchResults');
Route::get('shop/order', 'ShopController@order');
Route::get('shop/update-cart', 'ShopController@updateCart');
Route::get('shop/remove-item', 'ShopController@removeItem');
Route::get('shop/clear-cart', 'ShopController@clearCart');
Route::get('shop/clear-wishlist', 'ShopController@clearWishlist');
Route::get('shop/checkout', 'ShopController@checkout');
Route::get('shop/wishlist', 'ShopController@wishlist');
Route::get('shop/add-to-cart', 'ShopController@addToCart');
Route::get('shop/add-to-wishlist', 'ShopController@addToWishlist');
Route::get('shop/{category_url}', 'ShopController@products');
Route::get('shop/{category_url}/{product_url}', 'ShopController@item');

// User login & facebook
Route::post('user/signin', 'UserController@postSignin');
Route::post('user/signup', 'UserController@postSignup');
Route::get('/redirect', 'FacebookController@redirect');
Route::get('/callback', 'FacebookController@callback');
Route::get('user/logout', 'UserController@logout');

// CMS
Route::get('cms/dashboard', 'CmsController@dashboard');
Route::resource('cms/menu', 'MenuController');
Route::resource('cms/content', 'ContentController');
Route::resource('cms/categories', 'CategoriesController');
Route::resource('cms/products', 'ProductsController');

// Pages
Route::get('/', 'PagesController@home');
Route::get('{url}', 'PagesController@dynamicMenu');


Route::get('/home', 'HomeController@index')->name('home');
