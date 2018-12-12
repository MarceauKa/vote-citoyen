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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstname }} {{ substr(Auth::user()->lastname, 0, 1) }}. <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('account.home') }}">
                                        {{ __('Mon compte') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @include('flash::message')

                <div class="row justify-content-center">
                    @yield('content')
                </div>
            </div>
        </main>

        <footer class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-muted">
                        {{ config('app.name') }} - Tout droits réservés
                    </div>
                    <div class="col-md-6 text-muted text-right">
                        <a href="#">Conditions générales d'utilisation</a> -
                        <a href="https://github.com/MarceauKa/vote-citoyen" target="_blank">Code source</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    @include('partials.scripts')
</body>
</html>
