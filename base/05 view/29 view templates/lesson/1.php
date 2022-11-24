<?php 

public function index()
{
    return view('page.page2');
}

Route::get('/', function () {
    return view('main.welcome');
});

Route::group(['namespace' => 'admin'], function() {
    Route::get('page2', 'Page2Controller@index');
});
