@extends('base')

@section('page_title', 'Admin - Plat - Création')

@section('content')
    <h1>Admin - Plat - Création</h1>

    <form action="{{ route('admin.plat.store') }}" method="post">
        @csrf
        <div>
            <input type="checkbox" name="epingle" id="plat_epingle">
            <label for="plat_epingle">épinglé</label>
        </div>
        <div>
            <input type="text" name="nom" id="" placeholder="nom du plat" value="">
        </div>
        <div>
            <input type="text" name="prix" id="" placeholder="prix du plat" value="">
        </div>
        <div>
            <textarea name="description" id="" cols="30" rows="10" placeholder="description du plat"></textarea>
        </div>
        <div>
            <select name="categorie_id" id="">
                <option value="">catégorie du plat</option>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form--radio-buttons--scrollable">
            @foreach ($photoPlats as $photoPlat)
            <div>
                <input type="radio" name="photo_plat_id" id="photo_plat_id_{{ $photoPlat->id }}" value="{{ $photoPlat->id }}">
                <label for="photo_plat_id_{{ $photoPlat->id }}">
                    <img class="form--radio-button-image" src="{{ asset($photoPlat->chemin) }}" alt="photo {{ $photoPlat->id }}">
                    <span>photo {{ $photoPlat->id }}</span>
                </label>
            </div>
            @endforeach
        </div>
        <div class="form--checkboxes--scrollable">
            <div>
                <input type="checkbox" name="etiquette_id[]" id="etiquette_id_1" value="1">
                <label for="etiquette_id_1">végétarien</label>
            </div>
            <div>
                <input type="checkbox" name="etiquette_id[]" id="etiquette_id_2" value="2">
                <label for="etiquette_id_2">poisson</label>
            </div>
        </div>
        <div>
            <button type="submit">Valider</button>
        </div>
    </form>
@endsection