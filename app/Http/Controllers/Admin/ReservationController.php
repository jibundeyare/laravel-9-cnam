<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        // récupération de la liste des réservations
        $reservations = Reservation::all();

        // transmission des réservations à la vue
        return view('admin.reservation.index', [
            'reservations' => $reservations,
        ]);
    }

    /**
     * Affiche un formulaire de création de réservation
     *
     * @return Response
     */
    public function create()
    {
        // valeurs par défaut
        $reservation = new stdClass;

        $reservation->nom = '';
        $reservation->prenom = '';
        $reservation->jour = '';
        $reservation->heure = '20:00';
        $reservation->nombre_personnes = 2;
        $reservation->tel = '';
        $reservation->email = '';

        // récupération des créneaux horaires de réservation
        $creneaux_horaires = $this->getCreneauxHoraires();

        // transmission des valeurs par défaut à la vue
        return view('admin.reservation.create', [
            'reservation' => $reservation,
            'creneaux_horaires' => $creneaux_horaires,
        ]);
    }

    /**
     * Enregistre les données d'une nouvelle réservation dans la BDD
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|min:2|max:100',
            'prenom' => 'required|min:2|max:100',
            'jour' => 'required|date|date_format:Y-m-d|after_or_equal:today',
            'heure' => 'required|date_format:H:i',
            'nombre_personnes' => 'required|numeric|gte:1|lte:20',
            'tel' => 'required|regex:/^[0-9]{2} *[0-9]{2} *[0-9]{2} *[0-9]{2} *[0-9]{2}$/',
            'email' => 'required|email:rfc,dns',
        ]);

        // création d'une réservation
        $reservation = new Reservation();

        $reservation->nom = $request->get('nom');
        $reservation->prenom = $request->get('prenom');
        $reservation->jour = $request->get('jour');
        $reservation->heure = $request->get('heure');
        $reservation->nombre_personnes = $request->get('nombre_personnes');
        $reservation->tel = $request->get('tel');
        $reservation->email = $request->get('email');
        $reservation->save();

        $request->session()->flash('confirmation', 'La création a bien été effectuée.');

        return redirect()->route('admin.reservation.index');
    }

    /**
     * Affiche un formulaire de modification d'une réservation
     *
     * @param integer $id identifiant de la réservation
     * @return Response
     */
    public function edit(int $id)
    {
        // récupération de la réservation
        $reservation = Reservation::find($id);

        // affichage d'une erreur 404 si la réservation est introuvable
        if (!$reservation) {
            abort(404);
        }

        // suppression des secondes
        $reservation->heure = substr($reservation->heure, 0, strlen($reservation->heure) - 3);

        // récupération des créneaux horaires de réservation
        $creneaux_horaires = $this->getCreneauxHoraires();

        // transmission de la réservation à la vue
        return view('admin.reservation.edit', [
            'reservation' => $reservation,
            'creneaux_horaires' => $creneaux_horaires,
        ]);
    }

    /**
     * Met à jour les données d'une réservation existante dans la BDD
     *
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'nom' => 'required|min:2|max:100',
            'prenom' => 'required|min:2|max:100',
            'jour' => 'required|date|date_format:Y-m-d|after_or_equal:today',
            'heure' => 'required|date_format:H:i',
            'nombre_personnes' => 'required|numeric|gte:1|lte:20',
            'tel' => 'required|regex:/^[0-9]{2} *[0-9]{2} *[0-9]{2} *[0-9]{2} *[0-9]{2}$/',
            'email' => 'required|email:rfc,dns',
        ]);

        // récupération de la réservation
        $reservation = Reservation::find($id);

        // affichage d'une erreur 404 si la réservation est introuvable
        if (!$reservation) {
            abort(404);
        }

        $reservation->nom = $request->get('nom');
        $reservation->prenom = $request->get('prenom');
        $reservation->jour = $request->get('jour');
        $reservation->heure = $request->get('heure');
        $reservation->nombre_personnes = $request->get('nombre_personnes');
        $reservation->tel = $request->get('tel');
        $reservation->email = $request->get('email');
        $reservation->save();

        $request->session()->flash('confirmation', 'Vos modifications ont été enregistrées.');

        return redirect()->route('admin.reservation.edit', ['id' => $reservation->id]);
    }

    public function delete(Request $request, int $id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            abort(404);
        }

        $reservation->delete();

        $request->session()->flash('confirmation', 'La suppression a bien été effectuée.');

        return redirect()->route('admin.reservation.index');
    }

    private function getCreneauxHoraires()
    {
        // @todo récupérer les créneaux horaires de la table restaurant en utilsant une clé

        // au lieu d'écrire les horaires en dur dans un contrôleur, il faut stocker ces données dans la table 'restaurant' en utilisant une clé ('creneaux_horaires' par exemple)
        // alors vous pourrez récupérer les créneaux horaires en utilisant la clé, comme dans la page contact
        $creneaux_horaires_str = "
            12:00
            12:15
            12:30
            12:45

            13:00
            13:15
            13:30
            13:45

            19:00
            19:15
            19:30
            19:45

            20:00
            20:15
            20:30
            20:45

            21:00
            21:15
            21:30
            21:45

            22:00
            22:15
            22:30
            22:45

            23:00
        ";

        // créé un tableau à partir de la chaîne de caractères
        $creneaux_horaires = preg_split("/[\s]+/", $creneaux_horaires_str);
        // supprime les lignes vides
        $creneaux_horaires = array_filter($creneaux_horaires, function($value) {
            return empty($value) ? false : true;
        });
        // réindexe le tableau (nécessaire car nous avons supprimer les lignes vides)
        $creneaux_horaires = array_values($creneaux_horaires);

        return $creneaux_horaires;
    }
}
