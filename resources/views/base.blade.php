<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} @yield('page_title')</title>
    @section('vite')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @show
</head>
<body>
    <header>
        <nav>
            <ul>
                @auth
                    <li><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                    <li><a href="{{ route('admin.reservation.index') }}">Réservation - Liste</a></li>
                    <li><a href="{{ route('admin.reservation.create') }}">Réservation - Création</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">déconnexion</a>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li><a href="{{ route('menu') }}">Menu</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    <li><a href="{{ route('reservation') }}">Réservation</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    @section('content')
    @show

    <footer>
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('menu') }}">Menu</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('reservation') }}">Réservation</a></li>
            <li><a href="{{ route('mentions-legales') }}">Mentions légales</a></li>
            @guest
                <li><a href="{{ route('login') }}">Connexion</a></li>
            @endguest
            <li>Copyright Foo Bar 2022</li>
        </ul>
    </footer>
</body>
</html>
