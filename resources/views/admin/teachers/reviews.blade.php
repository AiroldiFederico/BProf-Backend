@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($reviews) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Utente</th>
                    <th>E-mail</th>
                    <th>Voto</th>
                    <th>Recensione</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $elem)
                <tr>
                    <td>{{ $elem->guest_name }}</td>
                    <td>{{ $elem->guest_email }}</td>
                    <td>
                        @if ($elem->rate == 1)
                            &#9733;&#9734;&#9734;&#9734;&#9734;
                        @elseif ($elem->rate == 2)
                            &#9733;&#9733;&#9734;&#9734;&#9734;
                        @elseif ($elem->rate == 3)
                            &#9733;&#9733;&#9733;&#9734;&#9734;
                        @elseif ($elem->rate == 4)
                            &#9733;&#9733;&#9733;&#9733;&#9734;
                        @elseif ($elem->rate == 5)
                            &#9733;&#9733;&#9733;&#9733;&#9733;
                        @endif
                    </td>
                    <td>{{ $elem->description }}</td>
                    <td>{{ $elem->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
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