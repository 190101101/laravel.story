<?php 


$validator = Validator::make($request->all(), [
    'title' => 'required|active_url',
    'content' => 'required',
    'must' => 'accepted',
])->validate();