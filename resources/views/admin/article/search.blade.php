@extends('admin.layout.admin')
@section('title', 'article')
@section('nav', 'article')
@section('search', route('article.search'))

@section('content')

<div class="page-header">
    <h3 class="page-title">search: {{$query}} | founded: {{count($data['article'])}} article</h3>
    <div class="d-flex align-items-center justify-content-between ">
        <a href="{{route('article.index')}}" class="btn btn-outline-success btn-fw">back</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>sub title</th>
                                <th>category</th>
                                <th width="50">status</th>
                                <td width="20"><i class="mdi mdi-tooltip-edit"></i></td>
                                <td width="20"><i class="mdi mdi-delete"></i></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['article'] as $article)
                            <tr>
                                <td>
                                    <a href="{{route('article.show', $article->id)}}">
                                        {{$article->id}}
                                    </a>
                                    </td>
                                <td>{{Str::substr($article->title, 0, 20)}}</td>
                                <td>{{Str::substr($article->subtitle, 0, 10)}}</td>
                                <td>
                                    <a href="{{$article->getCategory->slug}}">
                                        {{Str::substr($article->getCategory->title, 0, 15)}}
                                    </a>
                                </td>
                                <td>
                                    <label class="switch">
                                    <input type="checkbox" class="data-get"
                                        data-get="{{route('article.status', $article->id)}}"  {{$article->status == 1 ? 'checked' : null}}> 
                                    <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    <a href="{{route('article.edit', $article->id)}}">
                                        <i class="mdi mdi-tooltip-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a data-get="{{route('article.destroy', $article->id)}}" class="data-delete">
                                        <i class="mdi mdi-delete"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
