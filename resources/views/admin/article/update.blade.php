@extends('admin.layout.admin')
@section('title', 'article')
@section('nav', 'article')
@section('search', route('article.search'))

@section('content')
<div class="page-header">
  <h3 class="page-title">update</h3>
   <div class="d-flex align-items-center justify-content-between ">
        <a href="{{route('article.index')}}" class="btn btn-outline-success btn-fw">back</a>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{route('article.update', $article->id)}}" method="POST" class="forms-sample">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputName1">title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputName1" value="{{$article->title}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">subtitle</label>
                        <input type="text" name="subtitle" class="form-control" id="exampleInputName1" value="{{$article->subtitle}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">category</label>
                        <select name="category_id" class="form-control text-white" id="exampleSelectGender">
                            <option value="{{$article->category_id}}" selected>{{$article->getCategory->title}}</option>
                            @foreach($data['category'] as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editor1">content</label>
                        <textarea name="content" class="form-control" id="editor1">{{$article->content}}</textarea>
                        <script>CKEDITOR.replace('editor1')</script>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">created at</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{$article->created_at}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">updated at</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{$article->updated_at}}">
                    </div>
                    <input type="hidden" name="user_id" value="1">
                    <button type="submit" class="btn btn-success mr-2 btn-disable">update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection