<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userDatas = [
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => '123',
            ]
        ];

        foreach ($userDatas as $userData) {
            $user = new User();
            $user->name = $userData['name'];
            $user->email = $userData['email'];
            $user->password = Hash::make($userData['password']);
            $user->save();
        }
    }
}

