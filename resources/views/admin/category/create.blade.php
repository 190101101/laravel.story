@extends('admin.layout.admin')
@section('title', 'category')
@section('nav', 'category')
@section('search', route('category.search'))

@section('content')

<div class="page-header">
    <h3 class="page-title">create</h3>
    <div class="d-flex align-items-center justify-content-between ">
        <a href="{{route('category.index')}}" class="btn btn-outline-success btn-fw">back</a>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{route('category.store')}}" method="POST" class="forms-sample" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">subtitle</label>
                        <input type="text" name="subtitle" class="form-control" id="exampleInputName1" placeholder="subtitle" value="{{old('subtitle')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">image url</label>
                        <input type="url" name="image" class="form-control" id="exampleInputName1" placeholder="image" value="{{old('image')}}">
                    </div>
                    <div class="form-group">
                        <label for="editor1">content</label>
                        <textarea name="content" class="form-control" id="editor1">{{old('content')}}</textarea>
                            <script>CKEDITOR.replace('editor1')</script>
                    </div>
                    <button type="submit" class="btn btn-success mr-2 btn-disable">create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection