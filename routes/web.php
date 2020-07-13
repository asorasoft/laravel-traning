<?php

use Illuminate\Support\Facades\Route;

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

Route::get('', 'PeopleController@index');
Route::get('about', 'PeopleController@about');
Route::get('single', 'PeopleController@single');
Route::get('contact', 'PeopleController@contact');


Route::group(['prefix' => 'post'], function () {
    Route::group(['middleware' => ['auth:web']], function () {
        Route::get('create', 'PostController@create');
        Route::post('store', 'PostController@store');
        Route::post('update', 'PostController@update');
        Route::get('edit/{id}', 'PostController@edit');
        Route::get('delete/{id}', 'PostController@delete');
    });
    Route::get('detail/{id}', 'PostController@detail');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
