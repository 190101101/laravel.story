@extends('admin.layout.admin')
@section('title', 'user')
@section('nav', 'user')
@section('search', route('user.search'))

@section('content')

<div class="page-header">
    <h3 class="page-title">user {{$data['count']}}</h3>
    @include('admin.widget.bread')
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
                                <th>login</th>
                                <th>type</th>
                                <th width="50">status</th>
                                <td width="20"><i class="mdi mdi-tooltip-edit"></i></td>
                                <td width="20"><i class="mdi mdi-delete"></i></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['user'] as $user)
                            <tr>
                                <td>
                                    <a href="{{route('user.show', $user->id)}}">
                                        {{$user->id}}
                                    </a>
                                </td>
                                <td>{{$user->login}}</td>
                                <td>{{$user->type}}</td>
                                <td>
                                    <label class="switch">
                                    <input type="checkbox" class="data-get"
                                        data-get="{{route('user.status', $user->id)}}"  {{$user->status == 1 ? 'checked' : null}}> 
                                    <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    <a href="{{route('user.edit', $user->id)}}">
                                        <i class="mdi mdi-tooltip-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a data-get="{{route('user.destroy', $user->id)}}" class="data-delete">
                                        <i class="mdi mdi-delete"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>login</th>
                                <th>type</th>
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

{{$data['user']->links()}}

@endsection





