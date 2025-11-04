<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ajuste;
use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Role::create(['name' => 'SUPER ADMIN']);
        Role::create(['name' => 'ADMINISTRADOR']);
        Role::create(['name' => 'VENDEDOR']);
        Role::create(['name' => 'CONTABILIDAD']);
        Role::create(['name' => 'OPERADOR']);
        Role::create(['name' => 'CLIENTE']);

        User::create([
            'name' => 'Javier Borjas',
            'email' => 'cristman11@gmail.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('SUPER ADMIN');

        Ajuste::create([
            'nombre' => 'Ecommerce J&R',
            'descripcion' => 'Tienda virtual de productos variados',
            'sucursal' => 'Principal',
            'direccion' => 'Patricios 245',
            'telefonos' => '1123456789',
            'logo' => 'logos/TSwM8ajjemB85R45xNXDAP5HNcyOmfAyBbXfb6mj.png',
            'imagen_login' => 'imagenes_login/NVtGyFP0pMrw7l0pcJynHiByNvyNnPrPWjQi2BzW.png',
            'email' => 'cristman11@gmail.com',
            'divisa' => '$',
            'pagina_web' => 'https://www.ecommerce.com',
        ]);

        Categoria::factory(15)->create();

    }
}
