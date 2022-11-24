@extends('admin.layout.admin')
@section('title', 'contact')
@section('nav', 'contact')
@section('search', route('contact.search'))

@section('content')

<div class="page-header">
    <h3 class="page-title">contact {{$data['count']}}</h3>
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
                                <th>name</th>
                                <th>email</th>
                                <th>messsage</th>
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
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{Str::substr($contact->message, 0, 30)}}</td>
                                <td>
                                    <a data-get="{{route('contact.destroy', $contact->id)}}" class="data-delete">
                                        <i class="mdi mdi-delete"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>email</th>
                                <th>message</th>
                                <td width="20"><i class="mdi mdi-delete"></i></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{$data['contact']->links()}}

@endsection


