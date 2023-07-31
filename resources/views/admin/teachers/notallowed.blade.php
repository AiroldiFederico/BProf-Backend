@extends('layouts.app')

@section('title', 'Accesso vietato')

@section('content')

<div class="content">
    <div class="container">

        <div class="bord d-flex justify-content-center flex-wrap"> 
            <h1 class="notallowed text-center">
                Non è consentito modificare il profilo di un altro professore!
            </h1>
            <button onclick="history.back()" class="btn_reg_el">
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

    .btn_reg_el{
  border: 2px solid rgb(225, 27, 27);
  outline: none;
  padding: 7px 21px;
  border-radius: 32px;
  background: transparent;
  backdrop-filter: blur(10px);
  display: inline;
  align-items: center;
  cursor: pointer;
  transition: all 200ms ease;
  background-color: rgb(225, 27, 27);
}
</style>