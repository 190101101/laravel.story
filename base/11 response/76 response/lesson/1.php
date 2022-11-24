<?php 


Route::get('/response', function () {
    return response('cookie the cat', 200)
        ->header('Content-Type', 'text-plain');
});


