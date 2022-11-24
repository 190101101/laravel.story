@extends('admin.layout.admin')
@section('title', 'article show')
@section('nav', 'article')
@section('search', route('article.search'))

@section('content')
    <div class="page-header">
      <h3 class="page-title"> show article </h3>
       <div class="d-flex align-items-center justify-content-between ">
            <a href="{{route('article.index')}}" class="btn btn-outline-success btn-fw">articles</a>
        </div>
    </div>
    
    <div class="row">
      <div class="col-lg-12 grid-margin">
        <div class="card">
          <div class="card-header">
                {{$article->title}}
          </div>
          <div class="card-body">
              
              <div>
                <p>{!! $article->subtitle !!}</p>
                <p>{!! $article->content !!}</p>
              </div>
          </div>

          <div class="card-footer">
            <div class="d-flex justify-content-between">
                <span>id: {{$article->id}}</span>
                <span>updated: {{$article->updated_at}}</span>
                <span>created: {{$article->created_at}}</span>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection