

<?php 


$validator = Validator::make($request->all(), [
    'title' => 'email:rfc,dns',
    'content' => 'required',
    'must' => 'required',
])->validate();