<?php

namespace Database\Seeders;

use Faker;
use App\Models\Etiquette;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtiquetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        $etiquetteDatas = [
            "végétarien",
            "poisson",
            "bœuf",
            "poulet",
            "agneau",
            "sucré",
            "salé",
            "piquant",
            "très piquant",
            "chaud",
            "froid",
            "soft",
            "alcoolisé",
        ];

        foreach ($etiquetteDatas as $etiquetteData) {
            // création d'une nouvelle catégorie
            $etiquette = new Etiquette();
            // affectation d'un nom
            $etiquette->nom = $etiquetteData;
            // affectation d'une description
            $etiquette->description = '';
            // sauvegarde dans la BDD
            $etiquette->save();
        }

        for ($i = 0; $i < 20; $i++) {
            // création d'une nouvelle catégorie
            $etiquette = new Etiquette();
            // affectation d'un nom
            $count = random_int(1, 3);
            $etiquette->nom = ucfirst($faker->words($count, true));
            // affectation d'une description
            $count = random_int(5, 12);
            $etiquette->description = ucfirst($faker->words($count, true));
            // sauvegarde dans la BDD
            $etiquette->save();
        }
    }
}
