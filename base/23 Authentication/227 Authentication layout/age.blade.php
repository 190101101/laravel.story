<h1>age page</h1>
<hr>

<form action="{{route('checkAge')}}" method="POST">
	@csrf
	<input type="text" name="age" placeholder="age">
	<button type="submit">log in</button>
</form>

