<?php

Route::group(['prefix' => 'post'], function (){
    Route::get('','PostController@index')->name('post.index');
    Route::get('show/{id}','PostController@getPostById')->name('post.get-post');
});
