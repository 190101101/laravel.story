<?php

Route::get('/page/{name}/{last?}', function ($name, $last=null) {
    return view('page', ['name' => $name, 'last' => $last]);
    // return $name . $last;
});
