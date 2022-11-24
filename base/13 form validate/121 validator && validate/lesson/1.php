<?php 


use Validator;

$validator = Validator::make($request->all(), [
    'title' => 'required',
    'content' => 'required',
    'must' => 'required',
])->validate();

if($validator->fails()){
    dd('zxc');
}