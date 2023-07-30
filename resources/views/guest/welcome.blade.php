@extends('layouts.app')
@section('content')

<div class="container_guest">
    <div class="background_image"></div>
    <div class="container_main_menu">
        <div class="container_main_heading">
            <h1 class="main_heading">Benvenuto in bProf</h1>
            <div class="container_cta">
                <a class="btn_reg" href="{{ route('register') }}">{{ __('Registrati') }}</a>
            </div>
            <div class="container_cta ms-1 pt-3 accedi">
             <span> Hai già un profilo? </span><a class="text-decoration-underline"  href="{{ route('login') }}">{{ __('Accedi') }}</a>
            </div>
        </div>
        <div class="container_grid_menu">
            <div class="box_menu_item">
                <a href="{{ url('admin') }}">
                    <div class="container_heading_box">
                        <h2 class="heading_box">Dashboard</h2>
                        <p class="subHeading_box">Accedi alla tua dashboard</p>
                    </div>
                    <div class="body_box">
                        <button class="btn_func">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </a>
            </div>
            <div class="box_menu_item">
                <a href="{{ url('login') }}">
                    <div class="container_heading_box">
                        <h2 class="heading_box">Profilo</h2>
                        <p class="subHeading_box">Accedi al tuo profilo</p>
                    </div>
                    <div class="body_box">
                        <button class="btn_func">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .container_guest{
        position: relative;
        top: 0;
        left: 0;  
        width: 100%;
        height: 100vh;
    }

    .background_image{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-image: url("https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1674&q=80");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover
    }

    .background_image::before{
        position: absolute;
        top: 0;
        left: 0;
        content: "";
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, .7);
        backdrop-filter: blur(5px);
    }

    .container_main_menu{
        position: relative;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .container_main_heading{
        position: relative;
        height: 100%;
        padding: 0 60px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .container_cta{
        margin-top: 1em;
    }

    .btn_reg{
        border: 2px solid #89ce94;
        outline: none;
        padding: 10px 26px;
        border-radius: 32px;
        background: transparent;
        backdrop-filter: blur(10px);
        display: inline;
        align-items: center;
        cursor: pointer;
        transition: all 200ms ease;
    }

    .btn_reg:hover {
        background: #89ce94;
    }

    .main_heading{
        color: #000;
        font-size: 3.5rem;
        font-weight: 600;
    }

    .container_grid_menu{
        position: relative;
        z-index: 40;
        top: 0;
        left: 0;
        width: 100%;
        /* height: 100%; */
        display: grid;
        align-items: flex-end;
        grid-template-columns: repeat(2, 1fr);
    }

    .box_menu_item{
        width: 100%;
        aspect-ratio: 4 / 0;
        padding: 3em 1.5em;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        cursor: pointer;
        background: rgba(0, 0, 0, .5);
        border-right: 1px solid rgba(255, 255, 255, .5);
        border-top: 1px solid rgba(255, 255, 255, .5);
        backdrop-filter: blur(3px);
    }

    .heading_box{
        color: #fff;
        font-size: 1.7rem;
        font-weight: 600;
        margin-bottom: .3em;
    }

    .subHeading_box{
        color: #fff;
        font-size: 1rem;
        font-weight: 400;
    }

    .btn_func{
        width: 60px;
        height: 60px;
        aspect-ratio: 1;
        border: none;
        outline: none;
        border-radius: 50%;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 200ms ease;
    }

    .box_menu_item:hover .btn_func{
        opacity: 1;
    }

    .btn_func i{
        font-size: 1.2rem
    }

    .reg{
    color: #000;
    background-color: 89ce94;
    padding: 1rem;
    border-radius: 1.5rem;
    font-weight: 500;
    margin-right: .3em;
    }

    .accedi{
        font-size: smaller
    }


    /* Media Query's */
    @media only screen and (max-width: 1100px) {
        .heading_box{
            font-size: 1.4rem;
        }
        .btn_func{
            width: 45px;
            height: 45px;
        }
        .container_main_heading{
            padding: 0 4%;
        }
        .main_heading{
            font-size: 3rem;
        }
    }

    /* Media Query's */
    @media only screen and (max-width: 500px) {
        .heading_box{
            font-size: 1.2rem;
        }
        .subHeading_box{
            font-size: 1rem
        }
    }

    /* Media Query's */
    @media only screen and (max-width: 450px) {
        .heading_box{
            font-size: 1rem;
        }
        .subHeading_box{
            font-size: .8rem;
        }
    }
</style>