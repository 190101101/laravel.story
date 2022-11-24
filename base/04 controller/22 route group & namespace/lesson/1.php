<?php 

Route::group(['namespace' => 'admin'], function() {
    Route::get('page2', 'Page2Controller@index');
    Route::get('page3', 'Page3Controller@index');
    Route::get('page4', 'Page4Controller@index');
});

