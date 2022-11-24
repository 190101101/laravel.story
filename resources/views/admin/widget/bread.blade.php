<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach(Request::segments() as $segment)
            @if(!$loop->last)
                <li class="breadcrumb-item"><a>{{$segment}}</a></li>
            @else
                <li class="breadcrumb-item active" aria-current="page">{{$segment}}</li>
            @endif
        @endforeach
    </ol>
</nav>