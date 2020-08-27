@extends('layouts.app')

@section('content')
    <h1 class="display-4">Company Details</h1>
    <a class="btn btn-secondary btn-lg" href="/companies" role="button">Go back</a><hr/>
        <div class="well">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <img style="width:100%" src="/storage/company_logos/{{$companies->logo}}">
                </div>
                <div class="col-md-8 col-sm-8">
                    <h3><b> {{$companies->name}} </b></h3>
                    <p><b>Email: </b> {{$companies->email}} </p>
                    <p><b>Website: </b> {{$companies->website}} </p><hr/>
                    @if(count($companies->employees) > 1)
                        <h5><b>Employees Name</b></h5>
                        @foreach($companies->employees as $employee)
                            <p><a href="/employees/{{ $employee->id }}">{{ $employee->firstname }}&nbsp{{ $employee->lastname }}</a></p>
                        @endforeach
                    @else
                        <h5><b>Employee Name</b></h5>
                        @foreach($companies->employees as $employee)
                            <p><a href="/employees/{{ $employee->id }}">{{ $employee->firstname }}&nbsp{{ $employee->lastname }}</a></p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div><hr/>
        @auth('admin')
        <div class="btn-group mr-2" role="group" aria-label="First group">
            <a href="/companies/{{$companies->id}}/edit" class="btn btn-info">Edit</a>
        </div>
        <div class="btn-group mr-2" role="group" aria-label="Second group">
            {!! Form::open(['action' => ['CompaniesController@destroy', $companies->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        </div>
        @endauth
@endsection