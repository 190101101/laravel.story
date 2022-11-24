<?php 


use Validator;

$validator = Validator::make($request->all(), [
    'title' => 'required',
    'content' => 'required',
    'must' => 'required',
]);

if($validator->fails()){
	return 'error';
}