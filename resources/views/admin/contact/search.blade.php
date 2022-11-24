@extends('admin.layout.admin')
@section('title', 'contact')
@section('nav', 'contact')
@section('search', route('contact.search'))

@section('content')

<div class="page-header">
    <h3 class="page-title">search: {{$query}} | founded: {{count($data['contact'])}} contact</h3>
    <div class="d-flex align-items-center justify-content-between ">
        <a href="{{route('contact.index')}}" class="btn btn-outline-success btn-fw">back</a>
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
                            @foreach($data['contact'] as $contact)
                            <tr>
                                <td>
                                    <a href="{{route('contact.show', $contact->id)}}">
                                        {{$contact->id}}
                                    </a>
                                    </td>
                                <td>{{Str::substr($contact->title, 0, 20)}}</td>
                                <td>{{Str::substr($contact->subtitle, 0, 10)}}</td>
                                <td>
                                    <a href="{{$contact->getCategory->slug}}">
                                        {{Str::substr($contact->getCategory->title, 0, 15)}}
                                    </a>
                                </td>
                                <td>
                                    <label class="switch">
                                    <input type="checkbox" class="data-get"
                                        data-get="{{route('contact.status', $contact->id)}}"  {{$contact->status == 1 ? 'checked' : null}}> 
                                    <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    <a href="{{route('contact.edit', $contact->id)}}">
                                        <i class="mdi mdi-tooltip-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a data-get="{{route('contact.destroy', $contact->id)}}" class="data-delete">
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
