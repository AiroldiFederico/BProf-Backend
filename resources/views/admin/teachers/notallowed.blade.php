@extends('layouts.app')

@section('content')

<div class="content">
    <div class="container">

        <div class="bord d-flex justify-content-center flex-wrap"> 
            <h1 class="notallowed">
                Non puoi modificare il profilo di un altro professore!
            </h1>
            <button onclick="history.back()" class="btn bg-danger-subtle border-danger text-danger">
                <i class="fa-solid fa-pencil"></i>
                Torna alla modifica del tuo profilo
            </button>
       </div>

    </div>
</div>

<style>
    .bord{
        margin-top: 15rem;
    }

    .notallowed{
        color: red;
        font-size: 3.5rem
    }
</style>