<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\PhotoPlat;
use App\Models\Plat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // toutes les catégories
        $categories = Categorie::all();
        // la première catégorie
        $categorie = $categories->first();

        // toutes les photos
        $photos = PhotoPlat::all();
        // la première photo
        $photo = $photos->first();

        $plat = new Plat();
        $plat->nom = "Foo";
        $plat->description = "Lorem ipsum dolor sit amet consectetur, adipisicing elit.";
        $plat->prix = 23.14;
        $plat->epingle = false;
        $plat->photo_plat_id = $photo->id;
        $plat->categorie_id = $categorie->id;
        $plat->save();
    }
}
