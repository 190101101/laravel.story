@extends('main.layout.main')
@section('content')

<div class="row gx-4 gx-lg-5 justify-content-center">
    @include('main.widget.articles')
    @include('main.widget.profile')
    {{$data['article']->links()}}
</div>

@endsection