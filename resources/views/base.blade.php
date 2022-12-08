<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
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
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('menu') }}">Menu</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="{{ route('reservation') }}">Réservation</a></li>
            </ul>
        </nav>
    </header>

    @section('content')
    @show

    <footer>
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('mentions-legales') }}">Mentions légales</a></li>
            <li>Copyright Foo Bar 2022</li>
        </ul>
    </footer>
</body>
</html>