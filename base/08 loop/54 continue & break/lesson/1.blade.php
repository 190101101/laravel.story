@for($i = 0; $i < 10; $i++)

	@if($i % 2 == 0)
		{{$i}}
		@continue
	@endif
@endfor

<br>

@for($i = 0; $i < 10; $i++)

	@if($i == 7)
		{{$i}}
		@break
	@else
		{{$i}}
	@endif
@endfor