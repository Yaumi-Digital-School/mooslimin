<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'MYLIAN GEDHE',
            'role' => 'admin',
            'email' => 'mozarone1@gmail.com',
            'password' => bcrypt('mylian214'),
            'remember_token' => Str::random(60)
        ]);

        User::create([
            'name' => 'GEDHE',
            'role' => 'admin',
            'email' => 'mozarone2@gmail.com',
            'password' => bcrypt('mylian214'),
            'remember_token' => Str::random(60)
        ]);
    }
}
