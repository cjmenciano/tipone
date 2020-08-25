@extends('layouts.app')

@section('content')
<div class="row">
    <div class="jumbotron text-center col-md-8 offset-md-2">
        <h1 class="display-4">{{$title}}</h1>
        @if(count($services) > 0)
        <ul class="list-group">
            @foreach($services as $service)
                <li class="list-group-item">{{$service}}</li>
            @endforeach
        </ul>
    @endif
    </div>
</div>
@endsection
