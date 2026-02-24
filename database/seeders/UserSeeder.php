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
        $user = User::create([
            'name' => 'cristian',
            'dni' => '45532962',
            'password' => Hash::make('cristian'),
            'es_activo' => 1,
            'role_id' => 1,
        ]);

        $roleId = Role::where('nombre', 'Super Usuario')->value('id');
        $user->roles()->sync([$roleId]);

        $user2 = User::create([
            'name' => 'admin',
            'dni' => '00000000',
            'password' => Hash::make('admin'),
            'es_activo' => 1,
            'role_id' => 1,
        ]);

        $roleId = Role::where('nombre', 'Admin')->value('id');
        $user2->roles()->sync([$roleId]);
    }
}
