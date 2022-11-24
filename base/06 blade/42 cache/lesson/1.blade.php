@extends('layout.app')
@section('title', 'index page')
@include('inc.navbar', ['menu1' => 'home', 'menu2' => 'about'])
@section('content')
	<h1>blade index view</h1>

	@php 
		echo __DIR__;
		echo '<br>';
		echo __FILE__;
	@endphp
@endsection()