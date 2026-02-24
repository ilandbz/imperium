<?php

namespace Database\Seeders;

use App\Models\GrupoMenu;
use App\Models\Menu;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // 1) Rol Super Usuario
        $role = Role::where('nombre', 'Super Usuario')->first();

        if (!$role) {
            // si prefieres, puedes crearlo automáticamente:
            // $role = Role::create(['nombre' => 'Super Usuario']);
            throw new \Exception("No existe el rol 'Super Usuario'. Créalo antes o descomenta el create().");
        }

        // 2) Grupos de menú (se crean si no existen)
        $grupos = [
            'General',
            'Casilla Electrónica',
            'Expedientes',
            'Arbitraje y Disputas',
            'Reportes',
            'Configuración',
            'Auditoría',
            'Catálogos del Sistema',
        ];

        foreach ($grupos as $titulo) {
            GrupoMenu::firstOrCreate(['titulo' => $titulo]);
        }

        // Helper para obtener id de grupo por titulo
        $grupoId = fn(string $titulo) => GrupoMenu::where('titulo', $titulo)->value('id');

        // 3) Menús para Super Usuario (privilegiado)
        $menus = [
            // GENERAL
            [
                'nombre' => 'Dashboard',
                'slug'   => 'dashboard',
                'icono'  => 'fas fa-tachometer-alt',
                'grupo'  => 'General',
                'orden'  => 1,
                'url'    => '/dashboard',
            ],
            [
                'nombre' => 'Bandeja Rápida',
                'slug'   => 'bandeja-rapida',
                'icono'  => 'fas fa-inbox',
                'grupo'  => 'General',
                'orden'  => 2,
                'url'    => '/bandeja',
            ],

            // CASILLA ELECTRÓNICA
            [
                'nombre' => 'Casillas',
                'slug'   => 'casillas',
                'icono'  => 'fas fa-envelope',
                'grupo'  => 'Casilla Electrónica',
                'orden'  => 1,
                'url'    => '/casillas',
            ],
            [
                'nombre' => 'Notificaciones',
                'slug'   => 'notificaciones',
                'icono'  => 'fas fa-bell',
                'grupo'  => 'Casilla Electrónica',
                'orden'  => 2,
                'url'    => '/notificaciones',
            ],
            [
                'nombre' => 'Pronunciamientos',
                'slug'   => 'pronunciamientos',
                'icono'  => 'fas fa-gavel',
                'grupo'  => 'Casilla Electrónica',
                'orden'  => 3,
                'url'    => '/pronunciamientos',
            ],
            [
                'nombre' => 'Plantillas',
                'slug'   => 'plantillas',
                'icono'  => 'fas fa-file-alt',
                'grupo'  => 'Casilla Electrónica',
                'orden'  => 4,
                'url'    => '/plantillas',
            ],

            // EXPEDIENTES
            [
                'nombre' => 'Expedientes',
                'slug'   => 'expedientes',
                'icono'  => 'fas fa-folder-open',
                'grupo'  => 'Expedientes',
                'orden'  => 1,
                'url'    => '/expedientes',
            ],
            [
                'nombre' => 'Ingreso / Registro',
                'slug'   => 'expedientes-crear',
                'icono'  => 'fas fa-folder-plus',
                'grupo'  => 'Expedientes',
                'orden'  => 2,
                'url'    => '/expedientes-create',
            ],
            [
                'nombre' => 'Seguimiento',
                'slug'   => 'expedientes-seguimiento',
                'icono'  => 'fas fa-search',
                'grupo'  => 'Expedientes',
                'orden'  => 3,
                'url'    => '/expedientes-seguimiento',
            ],
            [
                'nombre' => 'Adjuntos / Documentos',
                'slug'   => 'expedientes-documentos',
                'icono'  => 'fas fa-paperclip',
                'grupo'  => 'Expedientes',
                'orden'  => 4,
                'url'    => '/expedientes-documentos',
            ],

            // ARBITRAJE Y DISPUTAS
            [
                'nombre' => 'Solicitudes',
                'slug'   => 'solicitudes',
                'icono'  => 'fas fa-file-signature',
                'grupo'  => 'Arbitraje y Disputas',
                'orden'  => 1,
                'url'    => '/solicitudes',
            ],
            [
                'nombre' => 'Asignación de Árbitros / Junta',
                'slug'   => 'asignaciones',
                'icono'  => 'fas fa-user-tie',
                'grupo'  => 'Arbitraje y Disputas',
                'orden'  => 2,
                'url'    => '/asignaciones',
            ],
            [
                'nombre' => 'Audiencias',
                'slug'   => 'audiencias',
                'icono'  => 'fas fa-calendar-alt',
                'grupo'  => 'Arbitraje y Disputas',
                'orden'  => 3,
                'url'    => '/audiencias',
            ],
            [
                'nombre' => 'Resoluciones',
                'slug'   => 'resoluciones',
                'icono'  => 'fas fa-balance-scale',
                'grupo'  => 'Arbitraje y Disputas',
                'orden'  => 4,
                'url'    => '/resoluciones',
            ],

            // REPORTES
            [
                'nombre' => 'Reportes',
                'slug'   => 'reportes',
                'icono'  => 'fas fa-chart-bar',
                'grupo'  => 'Reportes',
                'orden'  => 1,
                'url'    => '/reportes',
            ],
            [
                'nombre' => 'Indicadores',
                'slug'   => 'indicadores',
                'icono'  => 'fas fa-chart-line',
                'grupo'  => 'Reportes',
                'orden'  => 2,
                'url'    => '/indicadores',
            ],

            // CONFIGURACIÓN
            [
                'nombre' => 'Usuarios',
                'slug'   => 'usuarios',
                'icono'  => 'fas fa-users-cog',
                'grupo'  => 'Configuración',
                'orden'  => 1,
                'url'    => '/usuarios',
            ],
            [
                'nombre' => 'Roles y Permisos',
                'slug'   => 'roles',
                'icono'  => 'fas fa-user-shield',
                'grupo'  => 'Configuración',
                'orden'  => 2,
                'url'    => '/roles',
            ],
            [
                'nombre' => 'Menús',
                'slug'   => 'menus',
                'icono'  => 'fas fa-bars',
                'grupo'  => 'Configuración',
                'orden'  => 3,
                'url'    => '/menus',
            ],
            [
                'nombre' => 'Parámetros del Sistema',
                'slug'   => 'parametros',
                'icono'  => 'fas fa-cogs',
                'grupo'  => 'Configuración',
                'orden'  => 4,
                'url'    => '/parametros',
            ],

            // AUDITORÍA
            [
                'nombre' => 'Bitácora',
                'slug'   => 'bitacora',
                'icono'  => 'fas fa-clipboard-list',
                'grupo'  => 'Auditoría',
                'orden'  => 1,
                'url'    => '/bitacora',
            ],
            [
                'nombre' => 'Accesos',
                'slug'   => 'accesos',
                'icono'  => 'fas fa-shield-alt',
                'grupo'  => 'Auditoría',
                'orden'  => 2,
                'url'    => '/accesos',
            ],

            // CATÁLOGOS
            [
                'nombre' => 'Catálogo de Materias',
                'slug'   => 'catalogo-materias',
                'icono'  => 'fas fa-book',
                'grupo'  => 'Catálogos del Sistema',
                'orden'  => 1,
                'url'    => '/catalogos-materias',
            ],
            [
                'nombre' => 'Sedes / Dependencias',
                'slug'   => 'sedes',
                'icono'  => 'fas fa-building',
                'grupo'  => 'Catálogos del Sistema',
                'orden'  => 2,
                'url'    => '/catalogos-sedes',
            ],
            [
                'nombre' => 'Tipos de Documento',
                'slug'   => 'tipos-documento',
                'icono'  => 'fas fa-file',
                'grupo'  => 'Catálogos del Sistema',
                'orden'  => 3,
                'url'    => '/catalogos-tipos-documento',
            ],
        ];

        // 4) Crear menús y asignar al rol
        $menuIds = [];

        foreach ($menus as $row) {
            $menu = Menu::firstOrCreate(
                [
                    'slug' => $row['slug'], // clave única lógica
                ],
                [
                    'nombre'         => $row['nombre'],
                    'grupo_menu_id'  => $grupoId($row['grupo']),
                    'icono'          => $row['icono'],
                    'orden'          => $row['orden'] ?? 1,
                    'url'            => $row['url'] ?? null,
                    'padre_menu_id'  => null,
                ]
            );

            // Por si ya existía pero con grupo/icono/orden/url viejos, lo actualizamos suavemente:
            $menu->update([
                'nombre'        => $row['nombre'],
                'grupo_menu_id' => $grupoId($row['grupo']),
                'icono'         => $row['icono'],
                'orden'         => $row['orden'] ?? $menu->orden,
                'url'           => $row['url'] ?? $menu->url,
            ]);

            $menuIds[] = $menu->id;
        }

        $role->menus()->sync($menuIds);
    }
}
