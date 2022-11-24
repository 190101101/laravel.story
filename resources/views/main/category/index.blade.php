@extends('main.layout.main')
@section('content')

<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-12">
        @foreach($data['category'] as $category)
        <div class="post-preview">
            <a href="/category/{{$category->slug}}">
                <h2 class="post-title">{{$category->title}}</h2>
                <h3 class="post-subtitle">{{$category->subtitle}}</h3>
            </a>

            <p class="post-meta">
                {{ $category->created_at->diffForHumans() }}
            </p>

        </div>
        @endforeach
    </div>
</div>
{{$data['category']->links()}}
@endsection

