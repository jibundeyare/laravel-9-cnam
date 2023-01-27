@extends('base')

@section('page_title', 'Admin - Modification')

@section('content')
    <h1>Admin - Réservation - Modification</h1>

    @if (Session::has('confirmation'))
        <div>
            {{ Session::get('confirmation') }}
        </div>
    @endif

    <form action="{{ route('admin.reservation.update', ['id' => $reservation->id]) }}" method="post">
        @csrf
        <div>
            <input type="text" name="nom" id="" value="{{ $reservation->nom }}">
        </div>
        <div>
            <input type="text" name="prenom" id="" value="{{ $reservation->prenom }}">
        </div>
        <div>
            <input type="date" name="jour" id="" value="{{ $reservation->jour }}">
        </div>
        <div>
            <input type="time" name="heure" id="" value="{{ $reservation->heure }}">
        </div>
        <div>
            <input type="number" name="nombre_personnes" id="" value="{{ $reservation->nombre_personnes }}">
        </div>
        <div>
            <input type="tel" name="tel" id="" value="{{ $reservation->tel }}" placeholder="06 12 34 56 78">
        </div>
        <div>
            <input type="email" name="email" id="" value="{{ $reservation->email }}">
        </div>
        <div>
            <button type="submit">Valider</button>
        </div>
    </form>

@endsection
