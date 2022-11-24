<form action="{{route('create')}}" method="POST" enctype="multipart/form-data">
	<input type="file" name="image" class="form-control" 	placeholder="image" value="{{old('image')}}">

<?php 


dd($request->file('image'));
return $request->file('image');