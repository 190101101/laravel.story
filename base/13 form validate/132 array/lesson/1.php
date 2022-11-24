<input type="text" name="must[]" class="form-control" placeholder="must" value="{{old('must')}}">

<?php 


$validator = Validator::make($request->all(), [
    'title' => 'required',
    'content' => 'required',
    'must' => 'array',
])->validate();