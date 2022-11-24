<input type="text" name="title" class="form-control" placeholder="title" value="{{old('title')}}">

<?php 

$request->flashOnly('title');
$request->flashOnly(['title', 'content']);
return back();