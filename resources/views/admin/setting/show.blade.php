@extends('admin.layout.admin')
@section('title', 'setting show')
@section('nav', 'setting')

@section('content')
    <div class="page-header">
      <h3 class="page-title"> show setting </h3>
       <div class="d-flex align-items-center justify-content-between ">
            <a href="{{route('setting.index')}}" class="btn btn-outline-success btn-fw">settings</a>
        </div>
    </div>
    
    <div class="row">
      <div class="col-lg-12 grid-margin">
        <div class="card">
          <div class="card-header">
                {{$setting->description}}
          </div>
          <div class="card-body">
              
              <div>
                <p>{!! $setting->key !!}</p>
                <p>{!! $setting->value !!}</p>
              </div>
          </div>

          <div class="card-footer">
            <div class="d-flex justify-content-between">
                <span>id: {{$setting->id}}</span>
                <span>updated: {{$setting->updated_at}}</span>
                <span>created: {{$setting->created_at}}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
          
@endsection