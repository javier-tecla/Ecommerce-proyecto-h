<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ajuste;
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

       User::create([
            'name' => 'Javier Borjas',
            'email' => 'cristman11@gmail.com',
            'password' => bcrypt('123456789'),
       ]);

       Ajuste::create([
            'nombre' => 'Ecommerce J&R',
            'descripcion' => 'Tienda virtual de productos variados',
            'sucursal' => 'Principal',
            'direccion' => 'Patricios 245',
            'telefonos' => '1123456789',
            'logo' => 'logos/rqCccDcSBdjdMpVglds6X9bWkmsFqXFqIzJC5PXf.png',
            'imagen_login' => 'imagenes_login/rqCccDcSBdjdMpVglds6X9bWkmsFqXFqIzJC5PXf.png',
            'email' => 'cristman11@gmail.com',
            'divisa' => '$',
            'pagina_web' => 'https://www.ecommerce.com',
       ]);

       Role::create(['name' => 'Super AdMIN']);
       Role::create(['name' => 'ADMINISTRADOR']);
       Role::create(['name' => 'VENDEDOR']);
       Role::create(['name' => 'CONTABILIDAD']);
       Role::create(['name' => 'OPERADOR']);
       Role::create(['name' => 'CLIENTE']);
    }
}
