<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'SUPER ADMIN']);
        Role::create(['name' => 'ADMINISTRADOR']);
        Role::create(['name' => 'VENDEDOR']);
        Role::create(['name' => 'CONTABILIDAD']);
        Role::create(['name' => 'OPERADOR']);
        Role::create(['name' => 'CLIENTE']);

        Permission::create(['name' => 'Ver dashboard del Admin']);
        Permission::create(['name' => 'Ajustes del sistema']);
        Permission::create(['name' => 'Actualizar Ajustes del sistema']);

        Permission::create(['name' => 'Listado de Roles']);

    }
}
