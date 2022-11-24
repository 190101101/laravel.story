<?php 



Route::get('/view', function () {
    return view('index', ['name' => 'cookie']);
})