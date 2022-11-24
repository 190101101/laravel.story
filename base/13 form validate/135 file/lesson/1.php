<input type="text" name="image" class="form-control" placeholder="image" value="{{old('image')}}">
<?php 


$validator = Validator::make($request->all(), [
    'image' => 'file',
])->validate();