<?php 

Route::get('/code', function () {
    return view('code');
});

Route::post('/code', function () {
    return $_SERVER['REQUEST_METHOD'];
});

?>

<h1>code page</h1>

<form action="/code" method="POST">
    @csrf
    <input type="submit" value="click">                
</form>