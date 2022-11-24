<?php 


$validator = Validator::make($request->all(), [
    'title' => 'required',
    'content' => 'required',
    'must' => 'after:16.05.1987',
    'must' => 'before:16.05.1989',
    'must' => 'before:16/05/1987',
    'must' => 'after:16-05-1987',
])->validate();