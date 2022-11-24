@extends('main.layout.main')
@section('content')

@section('header_bg', $category->image)
@section('header_title', $category->title)
@section('header_subtitle', $category->subtitle)

<div class="row gx-4 gx-lg-5 justify-content-center">
    @include('main.widget.articles')
    @include('main.widget.category')
</div>

{{$data['article']->links()}}
@endsection