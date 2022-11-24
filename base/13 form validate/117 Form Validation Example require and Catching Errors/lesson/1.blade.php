@php
	
    $data = $request->validate([
        'title' => 'required',
        'content' => 'required',
        'must' => 'required',
    ]);

    return $request->all();

@endphp

@if($errors->any())
	<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
 @endif