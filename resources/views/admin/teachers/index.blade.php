@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-6 m-auto mt-2">

    <div class="card">
      <img src="{{asset('storage/' . $teacher['profile_picture'])}}" class="card-img-top" alt="" width="90%">
      <div class="card-body">
        <h5 class="card-title">{{ $user->name }}</h5>
        <p class="card-text">{{$teacher->description}}</p>
        <p class="card-text">{{$teacher->price}}</p>
        <a href="{{route('teacher.edit', $teacher->id)}}" class="btn btn-success">Modifica il profilo</a>
      </div>
    </div>
  </div>
</div>
@endsection