@extends('layouts.app')

@section('content')
<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{$user->name}}</h5>
      <p class="card-text">{{$user->email}}</p>
    </div>
</div>
@endsection