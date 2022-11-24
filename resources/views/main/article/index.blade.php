@extends('main.layout.main')
@section('content')

@section('header_bg', $article->getCategory->image)
@section('header_title', $article->title)
@section('header_subtitle', $article->subtitle)

<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-9">
        <div class="post-preview">
            <div class="mb-3">
                <span>{!!$article->content!!}</span>
            </div>
            <p class="post-meta">
                id: {{$article->id}} / Posted by 
                    <strong class="text-info">{{$article->getUser->login}}</strong>
                {{ $article->created_at->diffForHumans() }}
                / view {{$article->hit}}
            </p>
        </div>
    </div>
    @include('main.widget.category')
</div>
@endsection

