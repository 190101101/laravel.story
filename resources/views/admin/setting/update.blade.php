@extends('admin.layout.admin')
@section('title', 'setting')
@section('nav', 'setting')

@section('content')
<div class="page-header">
  <h3 class="page-title">update</h3>
   <div class="d-flex align-items-center justify-content-between ">
        <a href="{{route('setting.index')}}" class="btn btn-outline-success btn-fw">back</a>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{route('setting.update', $setting->id)}}" method="POST" class="forms-sample">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="description1">description</label>
                        <input type="text" class="form-control" id="description1" value="{{$setting->description}}">
                    </div>
                    <div class="form-group">
                        <label for="key1">key</label>
                        <input type="text" class="form-control" id="key1" value="{{$setting->key}}">
                    </div>

                    <div class="form-group">
                        <label for="editor1">value</label>
                        @if($setting->type == 'text')
                            <input type="text" name="value" class="form-control" id="key1" value="{{$setting->value}}">
                        @elseif($setting->type == 'editor')
                            <textarea name="value" class="form-control" id="editor1">{{$setting->value}}</textarea>
                            <script>CKEDITOR.replace('editor1')</script>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="createdat1">created at</label>
                        <input type="text" class="form-control" id="createdat1" value="{{$setting->created_at}}">
                    </div>
                    <div class="form-group">
                        <label for="updated1">updated at</label>
                        <input type="text" class="form-control" id="updated1" value="{{$setting->updated_at}}">
                    </div>
                    <button type="submit" class="btn btn-success mr-2 btn-disable">update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection