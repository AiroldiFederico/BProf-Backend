@extends('layouts.app')

@section('title', 'Messaggi')

@section('content')
<div class="container">
    @if (count($messages) > 0)

        <h1 class="mb-5">Messaggi ricevuti</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Utente</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Messaggio</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $elem)
                    <tr>
                        <td>{{ $elem->name }}</td>
                        <td>{{ $elem->email }}</td>
                        <td>{{ $elem->message }}</td>
                        @php
                            $messageTime = new DateTime($elem->created_at);
                            $romeTime = new DateTimeZone('Europe/Rome');
                            $romeDateTime = clone $messageTime;
                            $romeDateTime->setTimezone($romeTime);
                            $formatted = $romeDateTime->format('d-m-y H:i:s');
                        @endphp
                         <td>{{ $formatted }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h1> Non hai messaggi </h1>
    @endif
</div>

<script>

</script>

    <style>
        .container{
            margin-top: 120px
        }
    </style>
@endsection