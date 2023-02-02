@extends('base')

@section('page_title', 'Admin - Réservation - Liste')

@section('content')
    <h1>Admin - Réservation - Liste</h1>

    @if (Session::has('confirmation'))
        <div>
            {{ Session::get('confirmation') }}
        </div>
    @endif

    <div>
        <a href="{{ route('admin.reservation.create') }}">Ajouter</a>
    </div>

    <table>
        <tr>
            <th>nom</th>
            <th>prénom</th>
            <th>jour</th>
            <th>heure</th>
            <th>couverts</th>
            <th>tél</th>
            <th>email</th>
            <th>actions</th>
        <tr>
        @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->nom }}</td>
                <td>{{ $reservation->prenom }}</td>
                <td>{{ $reservation->jour }}</td>
                <td>{{ $reservation->heure }}</td>
                <td>{{ $reservation->nombre_personnes }}</td>
                <td>{{ $reservation->tel }}</td>
                <td>{{ $reservation->email }}</td>
                <td>
                    <a href="{{ route('admin.reservation.edit', ['id' => $reservation->id]) }}">modifier</a>

                    {{-- formulaire de suppression avec un bouton --}}
                    <form action="{{ route('admin.reservation.delete', ['id' => $reservation->id]) }}" method="post" onsubmit="return window.confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">supprimer</button>
                    </form>

                    {{-- formulaire de suppression avec un lien --}}
                    <form action="{{ route('admin.reservation.delete', ['id' => $reservation->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('admin.reservation.delete', ['id' => $reservation->id]) }}" onclick="event.preventDefault(); if (window.confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')) { this.closest('form').submit(); }">supprimer</a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
