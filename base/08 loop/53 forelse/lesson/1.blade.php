@php($data = ['red', 'green', 'blue', 'yellow'])

@forelse($data as $key)
	<p>{{$key}}</p>
	@empty
		element is empty
@endforelse