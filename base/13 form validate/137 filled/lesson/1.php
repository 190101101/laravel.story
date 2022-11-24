<input type="text" name="title" class="form-control" placeholder="title" value="{{old('title')}}">

<?php 

$validator = Validator::make($request->all(), [
    'title' => 'filled',
])->validate();