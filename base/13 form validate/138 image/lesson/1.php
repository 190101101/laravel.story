<input type="file" name="title" class="form-control" placeholder="title" value="{{old('title')}}">

<?php 

$validator = Validator::make($request->all(), [
    'title' => 'image',
])->validate();