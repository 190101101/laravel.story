@extends('admin.layout.admin')
@section('title', 'category')
@section('nav', 'category')
@section('search', route('category.search'))

@section('content')
<div class="page-header">
  <h3 class="page-title">update</h3>
   <div class="d-flex align-items-center justify-content-between ">
        <a href="{{route('category.index')}}" class="btn btn-outline-success btn-fw">back</a>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{route('category.update', $category->id)}}" method="POST" class="forms-sample">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputName1">title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputName1" value="{{$category->title}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">subtitle</label>
                        <input type="text" name="subtitle" class="form-control" id="exampleInputName1" value="{{$category->subtitle}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">image url</label>
                        <input type="url" name="image" class="form-control" id="exampleInputName1" placeholder="image" value="{{$category->image}}">
                    </div>
                    <div class="form-group">
                        <label for="editor1">content</label>
                        <textarea name="content" class="form-control" id="editor1">{{$category->content}}</textarea>
                        <script>CKEDITOR.replace('editor1')</script>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">created at</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{$category->created_at}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">updated at</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{$category->updated_at}}">
                    </div>
                    <button type="submit" class="btn btn-success mr-2 btn-disable">update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection