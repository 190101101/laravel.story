<?php 


Route::get('/code2', function () {
    return 'code2 page';
})->name('zxc');


return redirect()->route('zxc');

