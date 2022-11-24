@extends('main.layout.main')
@section('content')

<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-12 mb-3">
        <form action="/article/update" method="POST">
            @csrf
            @method('PUT')
            <div class="form-floating">
                <input class="form-control" name="title" type="text" placeholder="title" value="{{old('title')}}">
                <label for="title">title</label>
            </div>

            <div class="form-floating">
                <input class="form-control" name="subtitle" type="text" placeholder="subtitle" value="{{old('subtitle')}}">
                <label for="subtitle">subtitle</label>
            </div>

            <div class="mt-2">
                <select name="category_id" class="form-control">
                    @foreach($data['category'] as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-2">
                <select name="type" class="form-control">
                    <option value="public">public</option>
                    <option value="draft">draft</option>
                </select>
            </div>

            <div class="form-floating mt-2">
                <textarea name="content" class="form-control" id="editor1">{{old('content')}}</textarea>
                <script>CKEDITOR.replace('editor1')</script>
            </div>
            
            <br />
            <button class="btn btn-success text-uppercase" type="submit">publish</button>
        </form>
    </div>

    @include('main.widget.profile')

</div>

@endsection


