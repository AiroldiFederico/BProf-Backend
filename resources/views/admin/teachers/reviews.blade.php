@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($reviews) > 0)
            
        <div class="d-flex h-100 flex-column justify-content-center">
            @foreach ($reviews as $elem)
            <div class="card my-2">
                <h5 class="card-header d-inline-block">{{ $elem->guest_name }}</h5>
                <div class="card-body">
                  <h6 class="card-title">{{$elem->guest_email}}</h6>
                  <h6 class="card-title">{{$elem->rate}}</h6>
                  <p class="card-text">{{$elem->description}}</p>
                  <span class="card-text">{{$elem->created_at}}</span>
                </div>
            </div>
            @endforeach
        </div>
        @else
            <h2>Non hai sono recensioni</h2>
        @endif
    </div>

    <style>
        .container{
            margin-top: 120px
        }
    </style>
@endsection