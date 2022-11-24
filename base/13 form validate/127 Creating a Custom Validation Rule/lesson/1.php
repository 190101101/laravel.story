<?php 

class Age implements Rule

public function passes($attribute, $value)
{
    return $value <= 18;
}

public function message()
{
    return 'you are is old';
}


use App\Rules\Age;

$validator = Validator::make($request->all(), [
    'title' => 'required',
    'content' => 'required',
    'must' => ['required', new Age],
])->validate();


@if($errors->any())
	<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
@endif