@extends('main.layout.main')
@section('content')

<div class="row gx-4 gx-lg-5 justify-content-center">
    
    <div class="col-md-12 col-lg-8 col-xl-7">
        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
        <div class="my-5">
            <form action="{{route('auth.register')}}" method="POST">
                @csrf
                <div class="form-floating">
                    <input class="form-control" id="login" name="login" type="text" placeholder="Enter your login..." />
                    <label for="login">login</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" id="password" name="password" type="password" placeholder="Enter your email..." data-sb-validations="required,email" />
                    <label for="password">password</label>
                </div>
                {{-- 
                <div class="form-floating">
                    <input class="form-control" id="confirm_password" name="confirm_password" type="password" placeholder="Enter your email..." data-sb-validations="required,email" />
                    <label for="confirm_password">confirm password</label>
                </div>
                 --}}
                <br />
                <button class="btn btn-success text-uppercase" type="submit">register</button>
            </form>
        </div>
    </div>

</div>
@endsection