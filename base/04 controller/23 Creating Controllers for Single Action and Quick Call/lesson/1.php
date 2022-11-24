<?php 

Route::group(['namespace' => 'admin'], function() {
    Route::get('page2', 'Page2Controller@index');
    Route::get('page2/id/{id}', 'Page2Controller@show');
    Route::get('page2/edit/{id?}', 'Page2Controller@edit');
    Route::get('page3', 'Page3Controller@index');
    Route::get('page4', 'Page4Controller@index');
    Route::get('single', 'SingleController');
});
