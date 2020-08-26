@extends('layouts.app')

@section('content')
    <h1 class="display-4">Company Lists</h1>
    @if(!Auth::guard('admin'))
        <a class="btn btn-info btn-lg" href="/companies/create" role="button">Add Company</a>
    @endif
        <hr/>
            @if(count($companies) > 0)
                @foreach($companies as $company)
                    <div class="well">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <img style="width:100%" src="/storage/company_logos/{{$company->logo}}">
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <h3><a href="/companies/{{$company->id}}">{{$company->name}}</a></h3>
                                <p><b>Email: </b>{{$company->email}}</p>
                                <p><b>Website: </b>{{$company->website}}</p>
                            </div>
                        </div>
                    </div><hr/>
                @endforeach
                {{$companies->links()}}
            @else
                <p>No record data.</p>
            @endif
@endsection