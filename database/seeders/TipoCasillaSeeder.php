<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoCasilla;

class TipoCasillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            ['nombre' => 'PERSONA NATURAL', 'role' => 'PERSONA NATURAL'],
            ['nombre' => 'INSTITUCIÓN',     'role' => 'INSTITUCION'],
            ['nombre' => 'ABOGADO',         'role' => 'ABOGADO'],
            ['nombre' => 'ARBITRAJE',       'role' => 'PERSONA NATURAL'],
            ['nombre' => 'PODER JUDICIAL',   'role' => 'INSTITUCION'],
        ];

        foreach ($tipos as $item) {
            $role = \App\Models\Role::where('nombre', $item['role'])->first();
            if ($role) {
                TipoCasilla::firstOrCreate(
                    ['nombre' => mb_strtoupper($item['nombre'])],
                    ['role_id' => $role->id]
                );
            }
        }
    }
}
