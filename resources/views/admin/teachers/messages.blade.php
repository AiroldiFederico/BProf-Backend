@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($messages) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Utente</th>
                    <th>E-mail</th>
                    <th>Messaggio</th>
                    <th>Data</th>
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
        <h2> Non hai messaggi </h2>
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