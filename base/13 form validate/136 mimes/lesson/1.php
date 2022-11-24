<input type="file" name="image" class="form-control" placeholder="image" value="{{old('image')}}">


<?php 

$validator = Validator::make($request->all(), [
    'image' => 'mimes:jpeg,png',
])->validate();
