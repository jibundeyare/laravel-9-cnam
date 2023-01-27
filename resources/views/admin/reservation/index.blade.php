@extends('base')

@section('page_title', 'Admin - Réservation - Liste')

@section('content')
    <h1>Admin - Réservation - Liste</h1>

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
                </td>
            </tr>
        @endforeach
    </table>
@endsection
