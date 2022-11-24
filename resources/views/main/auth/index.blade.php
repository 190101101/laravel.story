@extends('main.layout.main')
@section('content')

<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-12 col-lg-8 col-xl-7">
        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
        <div class="my-5">
            <form action="{{route('auth.login')}}" method="POST">
                @csrf
                <div class="form-floating">
                    <input class="form-control" id="login" name="login" type="text" placeholder="Enter your login..." value="{{old('login')}}">
                    <label for="login">login</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" id="password" name="password" type="text" placeholder="Enter your email..." value="{{old('password')}}"/>
                    <label for="password">password</label>
                </div>
                <br />
                <button class="btn btn-success text-uppercase" type="submit">log in</button>
            </form>
        </div>
    </div>

</div>
@endsection
