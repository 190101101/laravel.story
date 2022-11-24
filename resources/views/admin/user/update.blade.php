@extends('admin.layout.admin')
@section('title', 'user')
@section('nav', 'user')
@section('search', route('user.search'))

@section('content')
<div class="page-header">
  <h3 class="page-title">update</h3>
   <div class="d-flex align-items-center justify-content-between ">
        <a href="{{route('user.index')}}" class="btn btn-outline-success btn-fw">back</a>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{route('user.update', $user->id)}}" method="POST" class="forms-sample">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputName1">password</label>
                        <input type="text" name="password" class="form-control" id="exampleInputName1" value="{{$user->password}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">type</label>
                        <select name="type" class="form-control text-white" id="exampleSelectGender">
                            <option value="{{$user->type}}" selected>{{$user->type}}</option>
                            <option value="user">user</option>
                            <option value="moderator">moderator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">created at</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{$user->created_at}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">updated at</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{$user->updated_at}}">
                    </div>
                    <button type="submit" class="btn btn-success mr-2 btn-disable">update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection