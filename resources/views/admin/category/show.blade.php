@extends('admin.layout.admin')
@section('title', 'category show')
@section('nav', 'category')
@section('search', route('category.search'))

@section('content')
    <div class="page-header">
      <h3 class="page-title"> show category </h3>
       <div class="d-flex align-items-center justify-content-between ">
            <a href="{{route('category.index')}}" class="btn btn-outline-success btn-fw">categorys</a>
        </div>
    </div>
    
    <div class="row">
      <div class="col-lg-12 grid-margin">
        <div class="card">
          <div class="card-header">
                {{$category->title}}
          </div>
          <div class="card-body">
              
              <div>
                <p>{!! $category->subtitle !!}</p>
                <p>{!! $category->content !!}</p>
              </div>
          </div>

          <div class="card-footer">
            <div class="d-flex justify-content-between">
                <span>id: {{$category->id}}</span>
                <span>updated: {{$category->updated_at}}</span>
                <span>created: {{$category->created_at}}</span>
                @if(!empty($category->deleted_at))
                  <a href="{{route('category.delete', $category->id)}}">
                      <i class="mdi mdi-delete"></i>
                  </a>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
          


@endsection