<?php 

$messages = [
    'title.required' => 'field :attribute is required',
    'min' => 'min error',
];

$validator = Validator::make($request->all(), [
    'title' => 'required|min:15',
    'content' => 'required',
    'must' => 'required',
], $messages)->validate();