@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex h-100 flex-column justify-content-center">
            @foreach ($messages as $elem)
                
            <div class="card my-2">
                <h5 class="card-header d-inline-block">{{ $elem->name }}</h5>
                <div class="card-body">
                  <h6 class="card-title">{{$elem->email}}</h6>
                  <p class="card-text">{{$elem->message}}</p>
                  <span class="card-text">{{$elem->created_at}}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <style>
        .container{
            margin-top: 120px
        }
    </style>
@endsection