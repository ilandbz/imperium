<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user2 = User::create([
            'name' => 'admin',
            'dni' => '00000000',
            'password' => Hash::make('admin'),
            'es_activo' => 1,
            'role_id' => 1,
        ]);

        $roleSuper = Role::where('nombre', 'SUPER USUARIO')->first();
        if ($roleSuper) {
            $user2->roles()->sync([$roleSuper->id]);
        }

        $testUsers = [
            ['name' => 'user1', 'dni' => '11111111', 'role' => 'ABOGADO'],
            ['name' => 'user2', 'dni' => '22222222', 'role' => 'FISCAL'],
            ['name' => 'user3', 'dni' => '33333333', 'role' => 'INSTITUCION'],
            ['name' => 'user4', 'dni' => '44444444', 'role' => 'PERSONA NATURAL'],
        ];

        foreach ($testUsers as $u) {
            $newUser = User::create([
                'name' => $u['name'],
                'dni' => $u['dni'],
                'password' => Hash::make($u['name']),
                'es_activo' => 1,
                'role_id' => 1,
            ]);

            $role = Role::where('nombre', $u['role'])->first();
            if ($role) {
                $newUser->roles()->sync([$role->id]);
            }
        }
    }
}
