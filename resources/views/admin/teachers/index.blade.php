@extends('layouts.app')

@section('content')
<div class="container">
  @foreach ($inserzione as $elem)
  <div class="col-6 m-auto mt-2">

    <div class="card">
      <img src="{{asset('storage/' . $elem['profile_picture'])}}" class="card-img-top" alt="" width="90%">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text">{{ $elem['description'] }}</p>
        <p class="card-text">{{ $elem['price'] }}</p>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection