<div class="col-md-9">
    @foreach($data['article'] as $article)
    <div class="post-preview">
        <a href="/article/{{$article->getCategory->slug}}/{{$article->slug}}">
            <h2 class="post-title">{{$article->title}}</h2>
            <h3 class="post-subtitle">{{$article->subtitle}}</h3>
        </a>
        <p class="post-meta">
            <div class="d-flex justify-content-between">
                <div>
                id: {{$article->id}} / Posted by 
                <a href="/profile/{{$article->getUser->login}}">
                    <strong class="text-info">{{$article->getUser->login}}</strong>
                </a>
                {{$article->created_at->diffForHumans()}} / view: {{$article->hit}} 
                    @if(Auth::check())
                        @if(Auth::user()->id == $article->user_id)
                        /
                        <span class="text-warning">type: {{$article->type}}</span>
                        @endif
                    @endif
                </div>

                @if(Auth::check())
                    @if(Auth::user()->id == $article->user_id)
                        <div>
                            <a class="text-success" href="/article/edit/{{$article->id}}">
                                edit
                            </a>
                        </div>

                        <div>
                            <a class="text-danger" href="/article/delete/{{$article->id}}">
                                delete
                            </a>
                        </div>
                    @endif
                @endif
            </div>
        </p>
    </div>
    @endforeach
</div>