@extends('layouts.app')

@section('content')
<a class="btn btn-secondary btn-lg" href="/employees" role="button">Go back</a>
        <div class="jumbotron col-md-8 offset-md-2">
            <h1 class="display-4">Add New Employee</h1>
                {!! Form::open(['action' => 'EmployeesController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                        {{Form::label('firstname', 'Firstname')}}
                        {{Form::text('firstname', '', ['class' => 'form-control form-control-lg', 'placeholder' => 'Firstname'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('lastname', 'Lastname')}}
                        {{Form::text('lastname', '', ['class' => 'form-control form-control-lg', 'placeholder' => 'Lastame'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('company_name', 'Company')}}
                        {{Form::select('company_name', $companies,null, ['class' => 'form-control form-control-lg','placeholder' => 'Select a company'])}}                    
                    </div>
                    <div class="form-group">
                        {{Form::label('email', 'Email')}}
                        {{Form::text('email', '', ['class' => 'form-control form-control-lg', 'placeholder' => 'Email'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('phone', 'Phone')}}
                        {{Form::text('phone', '', ['class' => 'form-control form-control-lg', 'placeholder' => 'Phone', 'maxlength' => '11'])}}
                    </div>
                    {{Form::submit('Submit', ['class' => 'btn btn-primary btn-lg'])}}
                {!! Form::close() !!}
        </div>
@endsection