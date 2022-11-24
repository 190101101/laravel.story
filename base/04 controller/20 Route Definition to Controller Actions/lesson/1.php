<?php 

public function index()
{
    return view('page');
}

public function show($id)
{
    echo 'id ' . $id;
    //
}
    
Route::get('/page', 'Page1Controller@index');
Route::get('/page/{id}', 'Page1Controller@show');

