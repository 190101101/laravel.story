@extends('layout.app')
@section('title', 'index page')
@include('inc.navbar', ['menu1' => 'home', 'menu2' => 'about'])
@section('content')
	<h1>blade index view</h1>

	<span>hello</span>
	@br
	<span>cookie</span>
	@br
	@sayHello(cookie)
	@custom(hr)
@endsection()