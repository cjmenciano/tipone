@extends('layouts.app')

@section('content')
    <h1 class="display-4">Employee Lists</h1>
    @if(!Auth::guard('admin'))
        <a class="btn btn-info btn-lg" href="/employees/create" role="button">Add Employee</a>
    @endif
        <hr/>
            @if(count($employees) > 0)
                @foreach($employees as $employee)
                    <div class="well">
                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                                <h3><a href="/employees/{{$employee->id}}">{{$employee->firstname}} &nbsp {{$employee->lastname}}</a></h3>
                            </div>
                        </div>
                    </div><hr/>
                @endforeach
                {{$employees->links()}}
            @else
                <p>No record data.</p>
            @endif
@endsection