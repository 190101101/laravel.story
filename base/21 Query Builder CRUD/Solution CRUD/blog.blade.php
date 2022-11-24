@extends('layout.app')
@section('title', 'code page')
@section('content')

	<div class="container my-4">
		<h1 class="mb-3">blog view</h1>
		<div class="row">
			<div class="col-md-6">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
				<form action="{{route('create')}}" method="POST" enctype="multipart/form-data">
					@csrf
				 	<div class="form-group">
					    <label>title</label>
					    <input type="text" name="blog_title" maxlength="10" class="form-control" placeholder="title" value="{{old('title')}}">
				  	</div>
				  	<div class="form-group">
					    <label>content</label>
					    <input type="text" name="blog_content" maxlength="10" class="form-control" placeholder="content" value="{{old('content')}}">
				  	</div>
				  	<div class="form-group">
					    <label>must</label>
					    <input type="number" name="blog_must" class="form-control" placeholder="must" value="{{old('must')}}">
				  	</div>
				  	<div class="d-block">
				  		<button type="submit" class="btn btn-success"
				  		style="width:100%;">add</button>
					</div>
				</form>
			</div>
		
			<div class="col-md-6">
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>id</th>
							<th>title</th>
							<th>content</th>
							<th>must</th>
							<th>update</th>
							<th>delete</th>
						</tr>
					</thead>
					<tbody>
						@foreach($blogs as $blog)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$blog->id}}</td>
							<td>{{$blog->blog_title}}</td>
							<td>{{$blog->blog_content}}</td>
							<td>{{$blog->blog_must}}</td>
							<td>
								<a href="{{route('edit', $blog->id)}}">update</a>
							</td>
							<td>
								<a href="{{route('delete', $blog->id)}}">delete</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
	
				@isset($blog->id)				
					<a href="{{route('truncate')}}" class="btn btn-danger">truncate</a>
				@endisset
			</div>
		</div>
	</div>

@endsection

