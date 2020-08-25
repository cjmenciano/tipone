@extends('layouts.app')

@section('content')
<a class="btn btn-secondary btn-lg" href="/companies/{{$companies->id}}" role="button">Go back</a>
        <div class="jumbotron col-md-8 offset-md-2">
            <h1 class="display-4">Edit Company Information</h1>
            {!! Form::open(['action' => ['CompaniesController@update', $companies->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', $companies->name, ['class' => 'form-control form-control-lg', 'placeholder' => 'Name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('email', 'Email')}}
                    {{Form::text('email', $companies->email, ['class' => 'form-control form-control-lg', 'placeholder' => 'Email'])}}
                </div>
                <div class="form-group">
                    {{Form::label('website', 'Website')}}
                    {{Form::text('website', $companies->website, ['class' => 'form-control form-control-lg', 'placeholder' => 'Website'])}}
                </div>
                <div class="form-group">
                    {{Form::file('company_logo')}}
                </div>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class' => 'btn btn-primary btn-lg'])}}
            {!! Form::close() !!}
        </div>
@endsection