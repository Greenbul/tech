<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
    'as'   => 'index',
    'uses' => 'IndexController@getIndex',
]);

Route::get('links', [
    'as'   => 'links',
    'uses' => 'IndexController@getLinks',
]);

Route::get('news', [
    'as'   => 'news',
    'uses' => 'IndexController@getNews',
]);

Route::get('news/{slug}', [
    'as'   => 'news::slug',
    'uses' => 'IndexController@getNewsSlug',
]);

Route::get('contacts', [
    'as'   => 'contacts',
    'uses' => 'IndexController@getContacts',
]);

// Роуты аутентификации
Auth::routes();
