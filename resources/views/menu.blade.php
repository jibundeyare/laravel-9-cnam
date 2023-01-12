@extends('base')

@section('page_title', 'Menu')

@section('content')
    <h1>Menu</h1>

    @foreach ($categories as $categorie)
        <h2>{{ $categorie->nom }}</h2>
        <p>{{ $categorie->description }}</p>

        <ul>
            @foreach ($categorie->plats as $plat)
            <li>
                {{ $plat->nom }}<br>
                {{ $plat->prix }}<br>
                {{ $plat->description }}<br>
            </li>
            @endforeach
        </ul>
    @endforeach
@endsection
