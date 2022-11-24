<?php 

Route::get('/page', function () {
    return response()->page('this is page');
});

use Illuminate\Support\Facades\Response;

Response::macro('page', function($text){
    return Response::make('500 INFO '.strtoupper($text));
});