@extends('admin.layout.admin')
@section('title', 'contact show')
@section('nav', 'contact')
@section('search', route('contact.search'))

@section('content')
<div class="page-header">
  <h3 class="page-title"> show contact </h3>
   <div class="d-flex align-items-center justify-content-between ">
        <a href="{{route('contact.index')}}" class="btn btn-outline-success btn-fw">contact</a>
    </div>
</div>

<div class="row">
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-header">
            {{$contact->name}} /
            {{$contact->email}}
      </div>
      <div class="card-body">
            {{$contact->message}}
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-between">
            <span>id: {{$contact->id}}</span>
            <span>created: {{$contact->created_at}}</span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection