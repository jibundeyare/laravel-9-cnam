@extends('base')

@section('page_title', 'Menu')

@section('content')
    <h1>Menu</h1>

    <ul>
    @foreach ($categories as $categorie)
        <li>{{ $categorie->nom }} ({{ $categorie->description }})</li>
    @endforeach
    </ul>
@endsection
