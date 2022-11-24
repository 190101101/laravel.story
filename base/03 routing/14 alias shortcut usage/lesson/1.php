<?php 

Route::get('/home', function () {
    return view('home');
})->name('homepage');

Route::get('/page/{name}', function ($name) {
    return view('page');
})->name('newpage');
