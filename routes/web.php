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

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    //route posts
    Route::group(['prefix' => 'post'], function () {
        Route::get('create', 'PostController@create')->name('post.create');
        Route::get('show/{post}', 'PostController@show')->name('post.show');
        Route::get('edit/{id}', 'PostController@edit')->name('post.edit');
        Route::post('store', 'PostController@store')->name('post.store');
        Route::get('delete/{id}', 'PostController@destroy')->name('post.delete');
    });


});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
