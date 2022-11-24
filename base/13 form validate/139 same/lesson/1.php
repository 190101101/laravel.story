<div class="form-group">
    <label>title</label>
    <input type="text" name="title" class="form-control" placeholder="title" value="{{old('title')}}">
</div>

<div class="form-group">
	<label>content</label>
	<input type="text" name="content" class="form-control" placeholder="content" value="{{old('content')}}">
</div>

<?php 

$validator = Validator::make($request->all(), [
    'title' => 'same:content',
])->validate();