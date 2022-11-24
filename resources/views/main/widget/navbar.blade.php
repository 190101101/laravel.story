<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" 
        @if(Auth::check())
            @if(Auth::user()->type == 'admin' ||
             Auth::user()->type == 'moderator')
                href="/admin/panel"
                @else 
                href="/"
            @endif
        @else
            href="/"
        @endif
        >True Story</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="/about">about</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="/contact">contact</a>
                    </li>

                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="/profile">profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('auth.logout')}}">logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('auth.login')}}">login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('auth.register')}}">register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<header class="masthead" style="background-image: url(@yield('header_bg', '/main/assets/img/home-bg.png'))">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>@yield('header_title', 'True Story')</h1>
                    <span class="subheading">@yield('header_subtitle', 'Share your stories with us')</span>
                </div>
            </div>
        </div>
    </div>
</header>