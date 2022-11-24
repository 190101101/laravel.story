<?php

Route::match(['get', 'post'], 'request', function () {
    return $_SERVER['REQUEST_METHOD'];
});

Route::any('request2', function () {
    return $_SERVER['REQUEST_METHOD'];
});
