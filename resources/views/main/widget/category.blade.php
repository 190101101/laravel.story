<div class="col-md-3 mb-5">
    <div class="card">
        <a href="/category" class="card-header">
            categories
        </a>
    </div>
    @foreach($data['category'] as $category)
    <ul class="list-group ">
        <li class="list-group-item @if(Request::segment(2) == $category->slug) active @endif">
            <a href="/category/{{$category->slug}}">{{Str::substr($category->title, 0, 10)}}</a>
            <span class="bg-dark badge">{{$category->getCount()}}</span>
        </li>
    </ul>
    @endforeach
</div>
