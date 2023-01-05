<?php

namespace Database\Seeders;

use App\Models\PhotoPlat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoPlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photoDatas = [
            "img/plats/anh-nguyen-kcA-c3f_3FE-unsplash.jpg",
            "img/plats/martin-widenka-tkfRSPt-jdk-unsplash.jpg",
        ];

        foreach ($photoDatas as $photoData) {
            // création d'une nouvelle photo
            $photo = new PhotoPlat();
            // sélection d'un fichier jpg
            $photo->chemin = $photoData;
            // sauvegarde dans la BDD
            $photo->save();
        }
    }
}
