<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page1', 'main\Page1Controller@index');
Route::get('/page2', 'admin\Page2Controller@index');


