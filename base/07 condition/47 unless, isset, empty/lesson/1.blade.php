
	@php($count = 0)

	@unless($count)
		ok false
	@endunless

	@isset($count)
		ok isset
	@endisset

	@empty($count)
		ok empty
	@endempty
