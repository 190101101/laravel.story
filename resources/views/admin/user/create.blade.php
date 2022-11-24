@extends('admin.layout.admin')
@section('title', 'user')
@section('nav', 'user')
@section('search', route('user.search'))

@section('content')

<div class="page-header">
    <h3 class="page-title">create</h3>
    <div class="d-flex align-items-center justify-content-between ">
        <a href="{{route('user.index')}}" class="btn btn-outline-success btn-fw">back</a>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{route('user.store')}}" method="POST" class="forms-sample" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">login</label>
                        <input type="text" name="login" class="form-control" id="exampleInputName1" placeholder="login" value="{{old('login')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">password</label>
                        <input type="text" name="password" class="form-control" id="exampleInputName1" placeholder="password" value="{{old('password')}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">type</label>
                        <select name="type" class="form-control" id="exampleSelectGender">
                            <option value="user">user</option>
                            <option value="moderator">moderator</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mr-2 btn-disable">create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection