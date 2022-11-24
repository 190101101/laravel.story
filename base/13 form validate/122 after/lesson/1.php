<?php 

use Validator;

$validator = Validator::make($request->all(), [
    'title' => 'required',
    'content' => 'required',
    'must' => 'required',
]);

$validator->after(function($validator){
    $validator->errors()->add('after', 'after added');
    $validator->errors()->add('after2', 'after added2');
})->validate();