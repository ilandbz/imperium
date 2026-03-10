<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grupo_menus')->insert([
            ['nombre' => 'Portal Público'],
            ['nombre' => 'Casilla Electrónica'],
            ['nombre' => 'Expedientes'],
            ['nombre' => 'Arbitraje y Disputas'],
            ['nombre' => 'Administración'],
        ]);
    }
}
