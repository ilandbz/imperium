<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\GrupoMenu;
use App\Models\Role;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1) Obtener roles necesarios
        $role_super_admin = Role::where('nombre', 'SUPER USUARIO')->first();

        // 2) Obtener o crear Grupos de Menú
        $g_entidades = GrupoMenu::firstOrCreate(['nombre' => 'Entidades y Control']);
        $g_catalogos = GrupoMenu::firstOrCreate(['nombre' => 'Catálogos del Sistema']);

        $grupoId = function ($nombre) {
            return GrupoMenu::where('nombre', $nombre)->first()?->id;
        };

        // 3) Definición de Menús Generales (con Slug para evitar duplicados)
        $menus_data = [
            [
                'nombre' => 'Usuarios',
                'slug'   => 'usuarios',
                'icono'  => 'fas fa-users',
                'grupo'  => 'Entidades y Control',
                'orden'  => 10,
                'url'    => '/usuarios',
            ],
            [
                'nombre' => 'Roles',
                'slug'   => 'roles',
                'icono'  => 'fas fa-user-tag',
                'grupo'  => 'Entidades y Control',
                'orden'  => 11,
                'url'    => '/roles',
            ],
            [
                'nombre' => 'Menú Sistema',
                'slug'   => 'menus',
                'icono'  => 'fas fa-bars',
                'grupo'  => 'Entidades y Control',
                'orden'  => 12,
                'url'    => '/menus',
            ],
        ];

        // 4) Crear menús generales desde el array
        foreach ($menus_data as $row) {
            $menu = Menu::updateOrCreate(
                ['slug' => $row['slug']],
                [
                    'nombre'         => $row['nombre'],
                    'grupo_menu_id'  => $grupoId($row['grupo']),
                    'icono'          => $row['icono'],
                    'orden'          => $row['orden'] ?? 1,
                    'url'            => $row['url'] ?? null,
                ]
            );
            $menu->roles()->syncWithoutDetaching([$role_super_admin->id]);
        }

        // 5) Menús Específicos de Casilla y Expedientes (Manual)

        // EXPEDIENTES
        $m_expedientes = Menu::updateOrCreate(
            ['slug' => 'expedientes-gestion'],
            [
                'nombre' => 'GESTIÓN EXPEDIENTES',
                'url' => '/expedientes',
                'icono' => 'feather-folder',
                'grupo_menu_id' => $g_entidades->id,
                'orden' => 3,
            ]
        );
        $m_expedientes->roles()->syncWithoutDetaching([$role_super_admin->id]);

        // CASILLAS (Administración)
        $m_casillas = Menu::updateOrCreate(
            ['slug' => 'casillas-admin'],
            [
                'nombre' => 'ADMIN CASILLAS',
                'url' => '/casillas',
                'icono' => 'feather-mail',
                'grupo_menu_id' => $g_entidades->id,
                'orden' => 4,
            ]
        );
        $m_casillas->roles()->syncWithoutDetaching([$role_super_admin->id]);
    }
}
