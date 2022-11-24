@extends('admin.layout.admin')
@section('title', 'setting')
@section('nav', 'setting')

@section('content')

<div class="page-header">
    <h3 class="page-title">setting {{$data['count']}}</h3>
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
                                <th>description</th>
                                <th>key</th>
                                <th>value</th>
                                <td width="20"><i class="mdi mdi-tooltip-edit"></i></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['setting'] as $setting)
                            <tr>
                                <td>
                                    <a href="{{route('setting.show', $setting->id)}}">
                                        {{$setting->id}}
                                    </a>
                                </td>
                                <td>{{$setting->description}}</td>
                                <td>{{$setting->key}}</td>
                                <td>{{Str::substr($setting->value, 0, 30)}}</td>
                                <td>
                                    <a href="{{route('setting.edit', $setting->id)}}">
                                        <i class="mdi mdi-tooltip-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>description</th>
                                <th>key</th>
                                <td>value</td>
                                <td width="20"><i class="mdi mdi-tooltip-edit"></i></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


