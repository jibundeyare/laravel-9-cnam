<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 2 résa avec des données statiques
        // nom Foo
        // prénom Foo
        // jour 06/01/2023
        // heure 12:00
        // tel 0612345678
        // email foo.foo@example.com

        // nom Bar
        // prénom Bar
        // jour 13/01/2023
        // heure 12:00
        // tel 0634567812
        // email bar.bar@example.com

        // 48 résa avec des données aléatoires

        // nom
        $faker->lastName();

        // prénom
        $faker->firstName();

        // jour
        $faker->date('Y-m-d');

        // heure
        $faker->time('H:i');

        // le nombre de personnes

        // tel
        $faker->phoneNumber();

        // email
        $faker->safeEmail();
    }
}
