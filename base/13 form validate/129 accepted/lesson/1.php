<?php 


$validator = Validator::make($request->all(), [
    'title' => 'required',
    'content' => 'required',
    'must' => 'accepted',
])->validate();