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
            ['titulo' => 'Portal Público', 'created_at' => now(), 'updated_at' => now()],
            ['titulo' => 'Casilla Electrónica', 'created_at' => now(), 'updated_at' => now()],
            ['titulo' => 'Expedientes', 'created_at' => now(), 'updated_at' => now()],
            ['titulo' => 'Arbitraje y Disputas', 'created_at' => now(), 'updated_at' => now()],
            ['titulo' => 'Administración', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
