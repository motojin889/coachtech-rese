<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div id="nav-wrapper" class="nav-wrapper">
                    <div class="hamburger" id="js-hamburger">
                        <span class="hamburger__line hamburger__line--1"></span>
                        <span class="hamburger__line hamburger__line--2"></span>
                        <span class="hamburger__line hamburger__line--3"></span>
                    </div>
                    <nav class="sp-nav">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/register">Registration</a></li>
                            <li><a href="/login">login</a></li>
                            <li><form action="{{ route('logout') }}" method="post">
                                @csrf
                                <input type="submit" value="ログアウト">
                                </form>
                            </li>
                    </nav>
                    <div class="black-bg" id="js-black-bg"></div>
                </div>
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <form action="/serch" class="search">
                        <select name="area" id="" class="search-area">
                            <option value="all">All area</option>
                            <option value="1">東京都</option>
                            <option value="2">大阪府</option>
                            <option value="3">福岡県</option>
                        </select>
                        <select name="genre" id="" class="search-genre">
                            <option value="all">All genre</option>
                            <option value="1">寿司</option>
                            <option value="2">ラーメン</option>
                            <option value="3">焼肉</option>
                            <option value="4">イタリアン</option>
                            <option value="5">居酒屋</option>
                        </select>
                        <input type="text" name="serch_text" id="" class="search-text" placeholder="Search...">
                        <input type="submit" value="検索する" class="search-submit">
                    </form>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="js/layout.js"></script>
</body>

</html>