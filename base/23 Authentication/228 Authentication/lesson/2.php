<?php 


Route::get('/course', function(){
    return view('course');
})->middleware('auth');
