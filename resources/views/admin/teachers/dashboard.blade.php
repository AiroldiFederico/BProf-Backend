@extends('layouts.app')

@section('title', 'Dashboard | ' . $user)

@section('content')
<div class="container d-flex justify-content-between align-items-center">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>

    <div>
        <span class="small" id="date">  </span>
        <span style="font-size: 0.7rem" id="time">  </span>
    </div>
</div>
<div class="container">
        {{-- <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div> --}}
    <h1 class="fs-1"> Bentornato {{ $user }}! </h1>
    <h2>Crea il tuo profilo alla <a class="text-decoration-none text-success" href="{{route('teacher.create')}}"> pagina di registrazione! </a></h2>
    <h2>Controlla il tuo profilo alla <a class="text-decoration-none text-success" href="{{route('teacher.index')}}"> pagina dedicata! </a></h2>
</div>

@endsection

<script>
    // real time date and time
    const zeroFill = n => {
        return ('0' + n).slice(-2);
    }
    const interval = setInterval(() => {
        const now = new Date();
        const date = zeroFill(now.getUTCDate()) + ' / ' + zeroFill((now.getMonth() + 1)) + ' / ' + String(now.getFullYear()).slice(-2);
        const time = zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes());
        document.getElementById('date').innerHTML = date;
        document.getElementById('time').innerHTML = time;
    }, 1000);
</script>