@extends('layouts.app')

@section('title', 'Dashboard | ' . $user)

@section('content')
<div class="container_card">
    <div class="mb-3">
        <span class="small" id="date">  </span>
        <span style="font-size: 0.7rem" id="time">  </span>
    </div>
    <div class="container_grid_card">
        <div class="card_bp">
            <a class="card_link" href="{{route('teacher.create')}}">
                <div class="container_heading_card">
                    <h2 class="heading_card">Crea il tuo profilo da professore!</h2>
                    <p class="subHeading_card">bProf è il tuo partner per trovare nuovi clienti online.</p>
                </div>
                <div class="body_card">
                    <img class="body_img" src="https://plus.unsplash.com/premium_photo-1682088557696-acdd1516f7f8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="image teacher">
                </div>
            </a>
        </div>
        <div class="card_bp">
            <a class="card_link" href="{{route('teacher.index')}}">
                <div class="container_heading_card variant">
                    <h2 class="heading_card">Vai al tuo profilo da professore!</h2>
                    <p class="subHeading_card">Qui potrai vedere il tuo profilo da professore!</p>
                </div>
                <div class="body_card">
                    <img class="body_img" src="https://plus.unsplash.com/premium_photo-1664297732437-9dd4610086f2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="image teacher">
                </div>
            </a>
        </div>
    </div>
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

<style>
    .container_card{
        position: relative;
        top: 90px;
        padding: 30px 60px 30px 60px;
    }

    .container_grid_card{
        width: 100%;
        display: grid;
        gap: 3em;
        grid-template-columns: repeat(2, 1fr);
    }

    .card_bp{
        width: 100%;
        aspect-ratio: 9 / 4;
        border-radius: 10px;
    }

    .card_link{
        position: relative;
        width: 100%;
        height: 100%;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
    }

    .container_heading_card{
        position: relative;
        z-index: 10;
        background: rgb(16, 92, 255);
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 2em;
    }

    .container_heading_card.variant{
        background: rgb(163, 16, 255);
    }

    .heading_card{
        color: #fff;
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: .2em;
    }

    .subHeading_card{
        color: #dbdbdb;
        font-size: 1rem;
        font-weight: 400;
        margin-bottom: 0 !important
    }

    .body_card{
        position: relative;
        top: 0;
        left: 0;
        background: rgb(67, 255, 101);
        width: 100%;
        height: 100%;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .body_img{
        width: 100%;
        height: 100%;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        object-fit: cover;
    }

    /* Media Query's */
    @media only screen and (max-width: 1100px) {
        .container_card{
            padding: 30px 4% 30px 4%;
        }
        .container_grid_card{
            gap: 2em;
            grid-template-columns: repeat(1, 1fr);
        }
        .card_bp{
            aspect-ratio: 3 / 0;
        }
    }
</style>