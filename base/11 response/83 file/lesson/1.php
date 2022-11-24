<?php 


Route::get('/', function () {
    return redirect('/download/file.txt');
});

Route::get('/', function () {
    return response()->download('download/file.txt');
});
