<div class="col-md-3 mb-5">
    <div class="card">
        <a href="/category" class="card-header">
            info
        </a>
    </div>
    <ul class="list-group ">
        <li class="list-group-item">
            <span>login: {{$user->login}}</span>
        </li>
        <li class="list-group-item">
            <span>story: {{$user->getArticleCount()}}</span>
        </li>

        <li class="list-group-item">
            <span>type: {{$user->type}}</span>
        </li>
    </ul>
</div>
