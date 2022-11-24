
	@php($count = 1)

	@switch($count)
		@case(1)
			num is 1
			@break
		@case(2)
			num is 2
			@break
		@case(3)
			num is 3
			@break
		@default
			num is unknown
			@break
	@endswitch
		