<?php 

// Page3Controller

public function index()
{
    echo 'page 3 index method';
    echo "<a href='".route('admin.page2')."'>go to page 2</a>";
}

Route::group(['namespace' => 'admin'], function() {
    Route::get('page2', 'Page2Controller@index')->name('admin.page2');
    Route::get('page3', 'Page3Controller@index');
});

