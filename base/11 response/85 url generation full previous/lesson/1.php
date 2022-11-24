<?php 

Route::get('/page', function () {
    return url()->full();
});

Route::get('/page', function () {
    return url()->previous();
});

Route::get('/page', function () {
    return redirect(url()->previous());
});
