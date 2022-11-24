<?php 

Route::get('/redirect', function () {
    return redirect('/code');
});

Route::get('code2', 'CodeController@index2')->name('code2');

Route::get('/redirect', function () {
    // return redirect('/code');
    return redirect(route('code2'));
});


return redirect()->intended('home');
