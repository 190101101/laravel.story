<?php 


$validator = Validator::make($request->all(), [
    'title' => 'required',
    'content' => 'required',
    'must' => ['required', function($attribute, $value, $fail){
        if($value >= 18){
            $fail($attribute.' you are is old');
        }
    }]
])->validate();