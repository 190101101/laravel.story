<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title', 'blog')</title>
        <link rel="stylesheet" href="{{asset('admin')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="{{asset('admin')}}/assets/vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="{{asset('admin')}}/assets/vendors/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="{{asset('admin')}}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="{{asset('admin')}}/assets/vendors/owl-carousel-2/owl.carousel.min.css">
        <link rel="stylesheet" href="{{asset('admin')}}/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
        <link rel="stylesheet" href="{{asset('admin')}}/assets/css/style.css">
        <link rel="stylesheet" href="{{asset('general')}}/css/alertify.min.css">
        <link rel="stylesheet" href="{{asset('general')}}/css/general.css">
        <link rel="shortcut icon" href="{{asset('general')}}/assets/images/favicon.png" />
        <script src="{{asset('admin')}}/js/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <div class="container-scroller">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                @include('admin.widget.sidebar')
            </nav>
            <div class="container-fluid page-body-wrapper">
                <nav class="navbar p-0 fixed-top d-flex flex-row">
                    @include('admin.widget.navbar')
                </nav>
                <div class="main-panel">
                    <div class="content-wrapper">
                        @yield('content')
                    </div>
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
                        </div>
                    </footer>
                </div>
            </div>
        </div>

        <script src="{{asset('admin')}}/assets/vendors/js/vendor.bundle.base.js"></script>
        <script src="{{asset('admin')}}/assets/vendors/chart.js/Chart.min.js"></script>
        <script src="{{asset('admin')}}/assets/vendors/progressbar.js/progressbar.min.js"></script>
        <script src="{{asset('admin')}}/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="{{asset('admin')}}/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="{{asset('admin')}}/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
        <script src="{{asset('admin')}}/assets/js/off-canvas.js"></script>
        <script src="{{asset('admin')}}/assets/js/hoverable-collapse.js"></script>
        <script src="{{asset('admin')}}/assets/js/misc.js"></script>
        <script src="{{asset('admin')}}/assets/js/settings.js"></script>
        <script src="{{asset('admin')}}/assets/js/todolist.js"></script>
        <script src="{{asset('admin')}}/assets/js/dashboard.js"></script>
        <script src="{{asset('general')}}/js/alertify.min.js"></script>
        <script src="{{asset('general')}}/js/ajax.js"></script>

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