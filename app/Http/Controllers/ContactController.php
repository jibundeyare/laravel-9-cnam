<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        // SELECT * FROM categorie ORDER BY id ASC
        $categories = DB::table('categorie')
            ->orderBy('id', 'asc')
            ->get()
        ;

        return view('contact');
    }
}
