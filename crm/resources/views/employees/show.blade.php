@extends('layouts.app')

@section('content')
    <h1 class="display-4">Employee Details</h1>
        <a class="btn btn-secondary btn-lg" href="/employees" role="button">Go back</a><hr/>
            <div class="well">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a>{{$employees->firstname}} &nbsp {{$employees->lastname}}</a></h3>
                            <p><b>Email: </b>{{$employees->email}}</p>
                            <p><b>Phone Number: </b>{{$employees->phone}}</p>
                            <p><b>Company Name: </b><a href="/companies/{{$employees->company->id}}">{{$employees->company->name}}</a></p>
                    </div>
                </div>
            </div><hr/>
            @if(!Auth::guard('admin'))
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="/employees/{{$employees->id}}/edit" class="btn btn-info">Edit</a>
                </div>
                <div class="btn-group mr-2" role="group" aria-label="Second group">
                    {!! Form::open(['action' => ['EmployeesController@destroy', $employees->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!! Form::close() !!}
                </div>
            @endif
@endsection