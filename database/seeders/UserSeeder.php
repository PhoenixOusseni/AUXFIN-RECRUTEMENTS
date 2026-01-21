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
            [
                'nom' => 'DIALLO',
                'prenom' => 'Aminata',
                'telephone' => '70234567',
                'role_id' => 1,
                'email' => 'candidat1@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'nom' => 'TRAORE',
                'prenom' => 'Moussa',
                'telephone' => '75896321',
                'role_id' => 1,
                'email' => 'candidat2@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'nom' => 'SANKARA',
                'prenom' => 'Thomas',
                'telephone' => '60123456',
                'role_id' => 1,
                'email' => 'candidat3@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'nom' => 'SANKARA',
                'prenom' => 'Thomas',
                'telephone' => '60123456',
                'role_id' => 1,
                'email' => 'candidat4@gmail.com',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
