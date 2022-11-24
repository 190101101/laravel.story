<?php

Route::get('blog', 'BlogController@index');
Route::post('blog/create', 'BlogController@create')->name('create');
Route::get('blog/edit/{id}', 'BlogController@edit')->name('edit');
Route::post('blog/update/{id}', 'BlogController@update')->name('update');
Route::get('blog/delete/{id}', 'BlogController@destroy')->name('delete');
Route::get('blog/truncate', 'BlogController@truncate')->name('truncate');
