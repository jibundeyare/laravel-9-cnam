@extends('base')

@section('page_title', 'Menu')

@section('content')
    <h1>Menu</h1>

    @foreach ($categories as $categorie)
        <h2>{{ $categorie->nom }}</h2>
        <p>{{ $categorie->description }}</p>

        <ul>
            @foreach ($categorie->platsSortedByPrix as $plat)
            <li>
                <img class="menu--photo-plat" src="{{ asset($plat->photo->chemin) }}" alt="">
                {{ $plat->nom }} {{ $plat->prix }} eur<br>
                {{ $plat->description }}<br>
                @foreach ($plat->etiquettes as $etiquette)
                    #{{ $etiquette->nom }}
                @endforeach
            </li>
            @endforeach
        </ul>
    @endforeach
@endsection
