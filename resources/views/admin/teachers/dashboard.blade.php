@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            {{-- <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}
        </div>
        <h2 class="fs-1"> Bentornato {{ $user }}! </h2>
        <h2>Crea il tuo profilo alla <a class="text-decoration-none" {{route('teacher.create')}}> pagina di registrazione! </a></h2>
    </div>
</div>
@endsection
