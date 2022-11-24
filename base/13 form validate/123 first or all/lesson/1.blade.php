{{$errors->first()}}
{{$errors->first('content')}}
@if($errors->has('title')) lefemu @endif

@if($errors->has('title'))
	{{$errors->first('title')}}
@endif