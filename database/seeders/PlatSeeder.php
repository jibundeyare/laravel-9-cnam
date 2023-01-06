<?php

namespace Database\Seeders;

use Faker;
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
        $faker = Faker\Factory::create('fr_FR');

        // toutes les catégories
        // Categorie::all() c'est l'équivalent du SQL 'SELECT * FROM Categorie'
        $categories = Categorie::all();
        // le nombre d'éléments dans la collection
        $categoriesCount = $categories->count();

        // la première catégorie (entrée)
        $categorieEntree = $categories->first();
        // la deuxième catégorie (id 2 plat)
        // Categorie::find(2) c'est l'équivalent du SQL 'SELECT * FROM Categorie WHERE id = 2'
        $categoriePlat = Categorie::find(2);
        // la troisième catégorie (id 3 dessert)
        $categorieDessert = Categorie::find(3);
        // les autres catégories restantes
        $categoriePetitDejeuner = Categorie::find(4);
        $categorieBoisson = Categorie::find(5);

        // toutes les photos
        $photos = PhotoPlat::all();
        // la première photo
        $photo = $photos->first();

        $platDatas = [
            [
                'nom' => 'Foo',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
                'prix' => 23.14,
                'epingle' => false,
                'photo_plat_id' => $photo->id,
                'categorie_id' => $categorieEntree->id,
            ],
            [
                'nom' => 'Bar',
                'description' => 'Dolor sit amet consectetur, adipisicing elit lorem ipsum.',
                'prix' => 42.31,
                'epingle' => true,
                'photo_plat_id' => $photo->id,
                'categorie_id' => $categoriePlat->id,
            ],
            [
                'nom' => 'Baz',
                'description' => 'Amet consectetur, adipisicing elit lorem ipsum dolor sit.',
                'prix' => 12.15,
                'epingle' => true,
                'photo_plat_id' => $photo->id,
                'categorie_id' => $categorieDessert->id,
            ],
        ];

        foreach ($platDatas as $platData) {
            // création d'un nouveau plat
            $plat = new Plat();
            // affectation d'un nom
            $plat->nom = $platData['nom'];
            // affectation d'une description
            $plat->description = $platData['description'];
            // affectation d'un prix
            $plat->prix = $platData['prix'];
            // sélection du statut epinglé / pas épinglé
            $plat->epingle = $platData['epingle'];
            // affectation d'une photo
            $plat->photo_plat_id = $platData['photo_plat_id'];
            // affectation d'une catégorie
            $plat->categorie_id = $platData['categorie_id'];
            // sauvegarde dans la BDD
            $plat->save();
        }

        for ($i = 0; $i < 100; $i++) {
            // création d'un nouveau plat
            $plat = new Plat();
            // affectation d'un nom
            $plat->nom = $faker->words(2, true);
            // affectation d'une description
            $plat->description = $faker->words(10, true);

            // affectation d'un prix
            // le prix est aléatoire, compris entre 1 et 50 avec deux chiffres après la virgule
            $plat->prix = random_int(100, 5000) / 100;
            // version alternative avec faker
            // $plat->prix = $faker->randomFloat(2, 1, 50);

            // sélection du statut epinglé / pas épinglé
            // le statut épinglé est aléatoire, 0 == false, 1 == true
            $plat->epingle = (bool) random_int(0, 1);

            // affectation d'une photo
            $plat->photo_plat_id = $photo->id;

            // affectation d'une catégorie
            // la catégorie est choisie au hasard
            // un nombre aléatoire est tiré entre 0 et 5-1 (c-à-d 4)
            $categorieIndex = random_int(0, $categoriesCount - 1);
            // on utilise le nombre tiré au hasard pour accéder au Nième élément de la collection de catégories
            $categorie = $categories->get($categorieIndex);
            $plat->categorie_id = $categorie->id;

            // sauvegarde dans la BDD
            $plat->save();
        }
    }
}
