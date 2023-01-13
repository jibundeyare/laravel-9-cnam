<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        // SELECT * FROM restaurant ORDER BY id ASC
        $adresse = DB::table('restaurant')
            ->where('cle', '=', 'adresse')
            ->first()
        ;

        // dd($adresse->valeur);

        return view('contact', [
            'adresse' => $adresse->valeur,
        ]);
    }
}
