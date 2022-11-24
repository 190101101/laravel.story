<?php 

public function index2($id)
{
    $data = ['id' => $id];
    return view('main.page2', compact('data'));
}

Route::group(['namespace' => 'main'], function() {
    Route::get('page1', 'Page1Controller@index');
    Route::get('page2/{id}', 'Page1Controller@index2');
});

@php(dd($data))
