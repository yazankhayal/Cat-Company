<?php

Route::get('/admin/login', 'Auth\LoginAdminController@login_admin')->name('login_admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomepageController@index')->name('index');

Route::get('/about', 'HomepageController@about')->name('about');

Route::get('/services', 'HomepageController@products')->name('products');
Route::get('/previous', 'HomepageController@previous')->name('previous');
Route::get('/for_sell', 'HomepageController@for_sell')->name('for_sell');
Route::get('/service/{id?}/{name?}', 'HomepageController@product')->name('product');

Route::post('/request_services_post', 'HomepageController@request_products_post')->name('request_products_post');

Route::get('/contact', 'HomepageController@contact_us')->name('contact');
Route::post('/contact_post', 'HomepageController@contact_post')->name('contact_post');
Route::post('/request_product', 'HomepageController@request_product')->name('request_product');
Route::get('/blog', 'HomepageController@blog')->name('blog');

Route::post('/newsletter', 'HomepageController@newsletter')->name('newsletter');
Route::get('/change_language/{lang?}', 'HomepageController@change_language')->name('change_language');
Route::get('/currency_change/{id?}', 'HomepageController@currency_change')->name('currency_change');
Route::get('/blog/{id?}/{name?}', 'HomepageController@post')->name('post');
