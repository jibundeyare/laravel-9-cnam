<?php

namespace Database\Seeders;

use Faker;
use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        $categorieDatas = ["entrée", "plat", "dessert", "petit déjeuner", "boissons"];

        foreach ($categorieDatas as $categorieData) {
            $categorie = new Categorie();
            $categorie->nom = $categorieData;
            $categorie->description = $faker->words(8, true);
            $categorie->save();
        }
    }
}
