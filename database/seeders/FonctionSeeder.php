<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FonctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('fonctions')->insert([
            'nameFon' =>'ADMINISTRATEUR',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('fonctions')->insert([
            'nameFon' =>'CAMCIS',
            'created_at' => now(),
            'updated_at' => now(),
        ]);DB::table('fonctions')->insert([
            'nameFon' =>'COMPTABLE',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('fonctions')->insert([
            'nameFon' =>'JURIDIQUE',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('fonctions')->insert([
            'nameFon' =>'SYDONIA',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('fonctions')->insert([
            'nameFon' =>'EUGUCE',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('fonctions')->insert([
            'nameFon' =>'ARCHIVAGE',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
