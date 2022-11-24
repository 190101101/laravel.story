<?php 
// app/Providers/AuthServiceProvider.php
// class AuthServiceProvider

Gate::define('checkAge', function($user){
    if($user->course_auth == 1){
        return true;
    }else{
        return false;
    }
});


Route::get('/age', function(){
    if(Gate::allows('checkAge', Auth::user())){
        return view('age');
    }else{
        return 'oops';
    }
});
