<?php 


Route::get('/json', function () {
    return response()->json(['name' => 'cookie']);
});
