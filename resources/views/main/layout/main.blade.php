<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="{{$description}}" />
        <meta name="author" content="{{$author}}" />
        <title>@yield('title', $title)</title>
        <link rel="icon" type="image/x-icon" href="{{asset('main')}}/assets/favicon.ico" />
        <link href="{{asset('main')}}/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('general')}}/css/alertify.min.css">
        <script src="{{asset('main')}}/js/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        
        @include('main.widget.navbar')
        
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            @yield('content')
        </div>
        <!-- Footer-->
        <footer class="border-top">
            @include('main.widget.footer')
        </footer>
        
        <script src="{{asset('main')}}/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('main')}}/js/scripts.js"></script>
        <script src="{{asset('general')}}/js/alertify.min.js"></script>
        {{-- <script src="{{asset('general')}}/js/ajax.js"></script> --}}

        @if(session()->has('success'))
            <script>alertify.success('{{session('success')}}', 1)</script>
        @endif

        @if(session()->has('error'))
            <script>alertify.error('{{session('error')}}')</script>
        @endif

        @if(session()->has('warning'))
            <script>alertify.warning('{{session('warning')}}')</script>
        @endif

        @foreach($errors->all() as $error)
            <script>alertify.error('{{$error}}')</script>
        @endforeach

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    </body>
</html>
