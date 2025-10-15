<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nom' => 'OUEDRAOGO',
                'prenom' => 'Ousseni',
                'telephone' => '456789123',
                'role_id' => 3,
                'email' => 's-admin@gmail.com',
                'password' => Hash::make('password'),
            ],

            [
                'nom' => 'KABORE',
                'prenom' => 'St Patrick',
                'telephone' => '61365501',
                'role_id' => 1,
                'email' => 'candidat@gmail.com',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
