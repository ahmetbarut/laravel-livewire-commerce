<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/main.css') }}">
        @livewireStyles

        <!-- Scripts -->
    </head>
    <body x-data="{search_area:false}" :class="{'overflow-hidden': search_area}">
    <header @class('bg-white')>
        <div class="d-flex flex-row align-items-center p-4">
            <div class="col-3">
                <img src="{{ asset('img.png') }}" alt="logo" @class([ 'logo'])>
            </div>
            <div class=" d-flex flex-grow-1">
                <ul class="nav header-menu">
                    <li @class('nav-item')>
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                    <li @class('nav-item')>
                        <a href="{{ route('catalog.index') }}" class="nav-link">Shop</a>
                    </li>
                    <li @class('nav-item')>
                        <a href="#" class="nav-link">About</a>
                    </li>
                    <li @class('nav-item')>
                        <a href="#" class="nav-link">Latest</a>
                    </li>
                    <li @class('nav-item')>
                        <a href="#" class="nav-link">Blog</a>
                    </li>
                    <li @class('nav-item')>
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="col-1">
                <div class="d-flex flex-row justify-content-around align-items-center justify-content-between icons">
                    <a href="#" @click="search_area = !search_area" class="">
                        <i class="fa fa-search"></i>
                    </a>
                    <a href="#" class="">
                        <i class="fa fa-user"></i>
                    </a>
                    <a href="{{ route('cart.index') }}" class="position-relative">
                        <i class="fa fa-shopping-basket"></i>
                        @livewire('cart')
                    </a>

                </div>
            </div>
        </div>
        <livewire:search-product/>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="bg-light p-3">
        <div class="d-flex flex-row justify-content-center">
            <div class="col-3">
                <h4>Hızlı Linkler</h4>
                <ul class="navs">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Hakkımızda</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">İletişim</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Tüm Ürünler</a>
                    </li>
                </ul>

            </div>
            <div class="col-3">
                <h4>Ürünler</h4>
                <ul class="navs">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Son Eklenen Ürünler</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Popüler Ürünler</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">İndirime Giren Ürünler</a>
                    </li>
                </ul>

            </div>
            <div class="col-3">
                <h4>Destek</h4>
                <ul class="navs">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Sıkça Sorulan Sorular</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Şartlar Ve Koşullar</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Gizlilik Politikası</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Ödeme Yöntemi Bildir</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

    @livewireScripts
    @stack('scripts')
    </body>
</html>
