@extends('admin.layout.admin')
@section('title', 'category')
@section('nav', 'category')
@section('search', route('category.search'))

@section('content')

<div class="page-header">
    <h3 class="page-title">search: {{$query}} | founded: {{count($data['category'])}} category</h3>
    <div class="d-flex align-items-center justify-content-between ">
        <a href="{{route('category.index')}}" class="btn btn-outline-success btn-fw">back</a>
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
                                <th width="50">status</th>
                                <td width="20"><i class="mdi mdi-tooltip-edit"></i></td>
                                <td width="20"><i class="mdi mdi-delete"></i></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['category'] as $category)
                            <tr>
                                <td>
                                    <a href="{{route('category.show', $category->id)}}">
                                        {{$category->id}}
                                    </a>
                                </td>
                                <td title="{{$category->title}}">{{Str::substr($category->title, 0, 20)}}</td>
                                <td title="{{$category->subtitle}}">{{Str::substr($category->subtitle, 0, 10)}}</td>
                                <td>
                                    <label class="switch">
                                    <input type="checkbox" class="data-get"
                                        data-get="{{route('category.status', $category->id)}}"
                                        {{$category->status == 1 ? 'checked' : null}}> 
                                    <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    <a href="{{route('category.edit', $category->id)}}">
                                        <i class="mdi mdi-tooltip-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a data-get="{{route('category.destroy', $category->id)}}" class="data-delete">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>sub title</th>
                                <th width="50">status</th>
                                <td width="20"><i class="mdi mdi-tooltip-edit"></i></td>
                                <td width="20"><i class="mdi mdi-delete"></i></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
