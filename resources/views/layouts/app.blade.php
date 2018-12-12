<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ $page_title ?? 'Accueil' }} - {{ config('app.name', 'Laravel') }}
    </title>
    <meta name="description" content="{{ $page_description ?? '' }}">
    <link rel="icon" type="image/png" href="/favicon.png">
    @include('partials.styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="line-height: 24px;">
                    <img src="/favicon.png" alt="Logo" class="img-fluid" style="max-height: 24px;" />
                    {{ config('app.name') }}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('account.home') }}">{{ Auth::user()->firstname }} {{ substr(Auth::user()->lastname, 0, 1) }}.</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="content my-auto py-4">
            <div class="container">
                @include('flash::message')

                <div class="row justify-content-center">
                    @yield('content')
                </div>
            </div>
        </main>

        <footer class="footer py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <p class="lead">
                            <img src="/favicon.png" alt="Logo" class="img-fluid" style="max-height: 24px;" />
                            <strong>{{ config('app.name') }}</strong>
                        </p>
                        <p class="text-muted">
                            Tout droits réservés
                        </p>
                    </div>
                    <div class="col-md-9 text-muted">
                        <ul class="list-unstyled">
                            <li><a href={{ route('register') }}>Inscription</a> / <a href="{{ route('login') }}">Connexion</a></li>
                            <li><a href="#">Proposer un sondage</a></li>
                            <li><a href="{{ route('terms') }}">Conditions générales d'utilisation</a></li>
                            <li><a href="https://github.com/MarceauKa/vote-citoyen" target="_blank">Code source</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    @include('partials.scripts')
</body>
</html>
