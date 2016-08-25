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



Route::get('/', 'StoreController@index')->name('index');
Route::resource('store', 'StoreController');
Route::resource('article', 'ArticleController');

Route::get('/services/store', 'StoreController@apiGet')->name('servicesStore');
Route::get('/services/articles', 'ArticleController@apiGet')->name('servicesArticle');
//List all the articles that are in a specific store
Route::get('/services/articles/stores/{storeId}', 'ArticleController@apiGetArticles')->name('servicesStoreArticles');

