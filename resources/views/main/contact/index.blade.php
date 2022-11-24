@extends('main.layout.main')
@section('content')

@section('header_bg',  'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSCst1mqXmxYaAkAX0pyrr1I-LtjmaZiFUnEZkW14rXxEimZAOB7enZ6te-_aZvMoC2cHc&usqp=CAU')
@section('header_title',  'Contact page')
@section('header_subtitle',  'send me message')

<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-12 col-lg-8 col-xl-7">
        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
        <div class="my-5">
            <form action="/contact" method="POST">
                @csrf
                <div class="form-floating">
                    <input class="form-control" name="name" type="text" placeholder="name" value="{{old('name')}}">
                    <label for="name">name</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" id="email" name="email" type="text" placeholder="Enter your email..." value="{{old('email')}}"/>
                    <label for="email">email</label>
                </div>

                <div class="form-floating">
                    <textarea style="resize: none;" name="message" id="message" class="form-control">{{old('message')}}</textarea>
                    <label for="message">message</label>
                </div>
                <br />
                <button class="btn btn-success text-uppercase" type="submit">send</button>
            </form>
        </div>
    </div>
</div>
            
@endsection

