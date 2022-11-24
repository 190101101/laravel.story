<?php 

Route::get('/page/{name}', function ($name) {
    return $name;
})->where('name', '[a-zA-Z]+');

Route::get('/page/{name}', function ($name) {
    return $name;
})->where('name', '[0-9]+');

Route::get('/page/{name}/{last}', function ($name, $last) {
    return $name .' '. $last;
})->where(['name' => '[a-zA-Z]+', 'last' => '[0-9]+']);

