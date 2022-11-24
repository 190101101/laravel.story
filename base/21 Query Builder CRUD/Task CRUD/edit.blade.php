@extends('layout.app')
@section('title', 'edit page')
@section('content')

	<div class="container my-4">
		<h1>edit view</h1>
		<hr>
		
		<div class="row">
			<div class="col-md-6">
				<a href="/blog" class="btn btn-success mb-3">blog</a>
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
				@if(session()->has('status'))
					<div class="alert alert-success">
						<span>{{session('status')}}</span>
					</div>
				@endif
				<form action="{{route("update", $blog->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
				 	<div class="form-group">
					    <label>title</label>
					    <input type="text" name="blog_title" class="form-control" placeholder="title" value="{{$blog->blog_title ?? old('title')}}">
				  	</div>
				  	<div class="form-group">
					    <label>content</label>
					    <input type="text" name="blog_content" class="form-control" placeholder="content" value="{{$blog->blog_content ?? old('content')}}">
				  	</div>
				  	<div class="form-group">
					    <label>must</label>
					    <input type="number" name="blog_must" class="form-control" placeholder="must" value="{{$blog->blog_must ?? old('must')}}">
				  	</div>
				  	<div class="d-block">
				  		<button type="submit" class="btn btn-success"
				  		style="width:100%;">add</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection

