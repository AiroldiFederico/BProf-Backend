<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'BProf')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- CDN --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==' crossorigin='anonymous'/>

     {{--jquery-validation in italian--}}
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/localization/messages_it.js"></script> 
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

     {{-- Select --}}
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

     {{--Braintree  --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.24.0/js/dropin.min.js"></script>

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="header">
            <a class="header-brand" href="{{ url('/') }}">
                <div class="logo">
                    {{-- it contains the link to go back to home --}}
                    <a class="logo_link" href="{{url('/') }}">
                        <svg class="logo_svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 1045 315" style="enable-background:new 0 0 1045 315;" xml:space="preserve">
                            {{-- <style type="text/css">
                                .st0{fill:#FFFFFF;}
                            </style> --}}
                            <g>
                                <path class="st0" d="M294.8,0.2H20.1c-11,0-20,9-20,20v274.7c0,11,9,20,20,20h274.7c11,0,20-9,20-20V20.2   C314.8,9.2,305.8,0.2,294.8,0.2z M223.6,223c-3.4,6.6-7.9,12.2-13.7,17c-5.8,4.7-12.5,8.3-20.2,10.8s-16,3.8-24.8,3.8H86.3V60.4   h75.9c8.3,0,16.1,1.3,23.3,3.9c7.2,2.6,13.5,6.2,18.9,10.8c5.3,4.6,9.5,10,12.6,16.1c3.1,6.1,4.6,12.7,4.6,19.8   c0,10.3-2.5,19-7.5,25.9c-5,7-11.2,12.2-18.6,15.9v2.2c9.9,3.6,17.9,9.3,24,17s9.1,17.3,9.1,28.6   C228.6,208.9,226.9,216.4,223.6,223z"/>
                                <g>
                                    <path class="st0" d="M501,98c-3.3-7.5-8-14-14-19.4c-5.9-5.4-12.9-9.6-21-12.6c-8-3-16.6-4.5-25.8-4.5H372v193.7h36.5v-71.1h31.6    c9.2,0,17.8-1.5,25.8-4.5s15-7.2,21-12.6c5.9-5.4,10.6-11.9,14.1-19.3c3.4-7.5,5.1-15.8,5.1-25C506.1,113.7,504.4,105.4,501,98z     M462.4,141.4c-4.9,5.4-12.1,8.1-21.6,8.1h-32.2V96.2h32.2c4.9,0,9.1,0.7,12.7,2.2c3.6,1.4,6.6,3.4,9.1,5.8    c2.4,2.4,4.2,5.3,5.4,8.5s1.8,6.6,1.8,10C469.7,129.7,467.3,136,462.4,141.4z"/>
                                    <path class="st0" d="M625.7,178.7l0.3-1.9c5.6-2,10.9-4.7,16-8.2c5-3.5,9.5-7.6,13.3-12.2c3.8-4.6,6.8-9.7,8.9-15.4    c2.2-5.7,3.2-11.8,3.2-18.3c0-8.8-1.5-17-4.6-24.5c-3.1-7.5-7.4-13.9-13.1-19.3c-5.7-5.4-12.5-9.6-20.4-12.7    c-7.9-3.1-16.8-4.6-26.5-4.6h-70.6v193.7h36.5v-72.8h17l50,72.8h41.9v-2.2L625.7,178.7z M622.9,141.4c-5.3,5-12.1,7.5-20.4,7.5    h-33.8V95.1H603c4.5,0,8.5,0.8,12,2.3s6.4,3.6,8.8,6.1c2.3,2.5,4.1,5.4,5.3,8.7c1.2,3.2,1.8,6.6,1.8,10    C630.9,130,628.2,136.4,622.9,141.4z"/>
                                    <path class="st0" d="M885,118.8c-5.1-12.4-12.2-23.1-21.2-32.2c-9-9.1-19.7-16.3-32.1-21.5c-12.4-5.2-25.7-7.8-40.2-7.8    c-14.4,0-27.8,2.6-40.2,7.8c-12.4,5.2-23,12.4-32.1,21.5c-9,9.1-16.1,19.8-21.2,32.2c-5.1,12.4-7.7,25.6-7.7,39.6    c0,14.1,2.6,27.3,7.7,39.6c5.1,12.4,12.2,23.1,21.2,32.2c9,9.1,19.7,16.3,32.1,21.5c12.3,5.2,25.7,7.8,40.2,7.8    c14.4,0,27.8-2.6,40.2-7.8c12.3-5.2,23-12.4,32.1-21.5c9-9.1,16.1-19.8,21.2-32.2c5.1-12.3,7.7-25.6,7.7-39.6    C892.7,144.3,890.1,131.1,885,118.8z M851.2,185.6c-3.3,8.2-7.9,15.2-13.8,21c-5.9,5.8-12.7,10.3-20.6,13.5    c-7.9,3.2-16.3,4.9-25.3,4.9s-17.4-1.6-25.3-4.9c-7.9-3.3-14.7-7.8-20.6-13.5c-5.9-5.8-10.5-12.8-13.8-21c-3.3-8.2-5-17.3-5-27.2    c0-9.9,1.7-19,5-27.2s7.9-15.2,13.8-21c5.9-5.8,12.7-10.3,20.6-13.5c7.8-3.2,16.3-4.9,25.3-4.9s17.4,1.6,25.3,4.9    c7.8,3.2,14.7,7.8,20.6,13.5c5.9,5.8,10.5,12.8,13.8,21s5,17.3,5,27.2C856.2,168.3,854.5,177.4,851.2,185.6z"/>
                                    <polygon class="st0" points="1045,96.2 1045,61.6 922.2,61.6 922.2,255.2 958.7,255.2 958.7,177.9 1036.3,177.9 1036.3,143.3     958.7,143.3 958.7,96.2   "/>
                                </g>
                            </g>
                        </svg>
                        <span class="label_logo">Dashboard admin</span>
                    </a>
                </div>
                {{-- config('app.name', 'Laravel') --}}
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <div class="menu_container">
                    <button class="btn_cc">
                        <span class="label_btn">Menu</span>
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
                </div>
                <div class="menu_expanded_lists">
                    <div class="heading_menu">
                        @guest
                            <a class="item_page" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                        @if (Route::has('register'))
                            <a class="item_page" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                        @endif
                        @else
                            <div class="container_auth_info_profile">
                                <span>Bentornato</span>
                                <span>{{ Auth::user()->name }}!</span>
                            </div>
                            <div class="btn_cc">
                                <a class="dropdown-item menudrop" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Esci') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                    </div>
                    <ul class="list_menu">
                        <li class="item_list">
                            <a class="item_List_link" href="{{ url('admin') }}">
                                <div class="left_region">
                                    <span class="index"><i class="fa-solid fa-chalkboard"></i></span>
                                    <span class="titlePage">Dashboard Admin</span>
                                </div>
                                <div class="right_region">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                        </li>
                        <li class="item_list">
                            <a class="item_List_link" href="{{ url('admin/profile') }}">
                                <div class="left_region">
                                    <span class="index"><i class="fa-solid fa-user"></i></span>
                                    <span class="titlePage">Profile</span>
                                </div>
                                <div class="right_region">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                        </li>
                        @if (Auth::user())
                        <li class="item_list">
                            <a class="item_List_link" href="{{ url('admin/message') }}">
                                <div class="left_region">
                                    <span class="index"><i class="fa-solid fa-message"></i></span>
                                    <span class="titlePage">Messaggi</span>
                                </div>
                                <div class="right_region">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                        </li>
                        <li class="item_list">
                            <a class="item_List_link" href="{{ url('admin/reviews') }}">
                                <div class="left_region">
                                    <span class="index"><i class="fa-solid fa-star-half-stroke"></i></span>
                                    <span class="titlePage">Recensioni</span>
                                </div>
                                <div class="right_region">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                        </li>
                        @endif 
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#subjects').select2();
        });
    </script>
</body>

</html>

<script>
    document.querySelector('.btn_cc').addEventListener('click', function() {
        document.querySelector('.header').classList.toggle('header_expanded');
        document.querySelector('.logo_svg').classList.toggle('logo_svg_expanded');
        document.querySelector('.label_logo').classList.toggle('label_logo_expanded');
        document.querySelector('.fa-angle-down').classList.toggle('icon_menu_expanded');
        document.querySelector('.menu_expanded_lists').classList.toggle('menu_list_expanded');
    });

    window.addEventListener('scroll', function() {
        let header = document.querySelector('.header');
        let scrollOffset = window.pageYOffset;

        if (scrollOffset >= 5) {
            header.classList.add('header_active_scroll');
        } else {
            header.classList.remove('header_active_scroll');
        }
    });
</script>

<style>
a {
    color: #000 !important;
    text-decoration: none !important;
    list-style: none !important;
    list-style-type: none !important;
}

ul {
    padding: none !important;
    margin: none !important;
}

.collapse:not(.show){
    display: flex !important;
    justify-content: flex-end;
}

.header{
    position: fixed;
    z-index: 9999999;
    top: 0;
    left: 0;
    width: 100%;
    height: 90px;
    padding: 0 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: transparent;
}

.header.header_active_scroll{
    background: rgba(255, 255, 255, .7);
    backdrop-filter: blur(5px);
}

.header::before{
    position: absolute;
    top: 0;
    left: 0;
    content: "";
    width: 100%;
    height: 10px;
    background: rgb(90,154,101);
    background: linear-gradient(90deg, rgba(90,154,101,1) 0%, rgba(137,206,148,1) 100%);
    transition: height 200ms ease;
}

.logo_link{
    position: relative;
    z-index: 10;
    display: flex;
    align-items: center;
}

.logo_svg{
    fill: #000;
    width: 100px;
    transition: fill 200ms ease;
}

.label_logo{
    color: #000;
    font-size: .8rem;
    font-weight: 600;
    text-transform: uppercase;
    margin-left: 1em;
    opacity: .7;
    white-space: nowrap;
    transition: color 200ms ease;
}

.menu_container{
    height: 90px;
    padding: 0 1.5em;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #89ce94
}

.btn_cc{
    border: none;
    outline: none;
    padding: 6px 16px;
    border-radius: 32px;
    background: rgba(255, 255, 255, .5);
    backdrop-filter: blur(10px);
    display: flex;
    align-items: center;
    cursor: pointer;
    transition: all 200ms ease;
}

.btn_cc:hover{
    background: rgba(255, 255, 255, .3);
}

.label_btn{
    color: #000;
    font-size: .9rem;
    font-weight: 500;
    text-transform: uppercase;
    margin-right: .3em;
}

.btn_cc .fa-solid{
    color: #000;
    font-size: .9rem;
    transition: transform 200ms ease;
}

.header_expanded::before {
    height: 100vh;
}

.logo_svg_expanded {
    fill: #fff;
}

.label_logo_expanded {
    color: #fff;
}

.icon_menu_expanded{
    transform: rotate(180deg)
}

.menu_expanded_lists{
    position: absolute;
    top: 90px;
    left: 0;
    width: 100%;
    height: 0;
    overflow: hidden;
    opacity: 0;
    padding: 0 60px;
    display: flex;
    flex-direction: column;
    transition-property: height, opacity, overflow;
    transition-duration: 200ms;
    transition-timing-function: ease;
    /* justify-content: center; */
}

.list_menu{
    text-decoration: none;
    list-style: none;
    list-style-type: none;
    padding: none !important;
    margin: none !important;
    padding-left: 0 !important;
}

.item_List_link{
    width: 100%;
    height: 100px;
    padding: 0 3em !important;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0);
    opacity: .5;
    cursor: pointer;
    transition: all 200ms ease
}

.item_List_link:hover {
    background: rgba(255, 255, 255, .5);
    opacity: 1;
}

.left_region,
.right_region{
    display: flex;
    align-items: center;
}

.index{
    color: #000;
    font-size: 1rem;
    margin-right: 2em;
}

.titlePage{
    color: #000;
    font-size: 1.5rem;
}

.menu_list_expanded{
    height: 100vh;
    overflow: visible;
    opacity: 1;
}

.right_region .fa-arrow-right{
    color: #000;
}

.heading_menu{
    width: 100%;
    height: 45px;
    padding: 30px 60px;
    border-bottom: 1px solid rgba(255, 255, 255, .2);
    margin-bottom: 3em;
    display: flex;
    align-items: center;
}

.item_page{
    border: none;
    outline: none;
    padding: 6px 16px;
    border-radius: 32px;
    background: rgba(255, 255, 255, .5);
    backdrop-filter: blur(10px);
    margin-right: 1em;
    display: flex;
    align-items: center;
    cursor: pointer;
    transition: all 200ms ease;
}

.item_page:hover {
    opacity: .3;
}

.item_page:last-child{
    margin-right: 0;
}

.container_auth_info_profile{
    color: #000;
    font-size: 1.5rem;
    font-weight: 500;
    margin-right: .5em;
}

/* Media Query's */
@media only screen and (max-width: 1100px) {
    .header,
    .menu_expanded_lists,
    .heading_menu{
        padding: 0 4%
    }
    .label_logo{
        white-space: pre-wrap;
    }
}
</style>