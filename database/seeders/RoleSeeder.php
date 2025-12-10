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
        $super_admin = Role::create(['name' => 'SUPER ADMIN']);
        Role::create(['name' => 'ADMINISTRADOR']);
        Role::create(['name' => 'VENDEDOR']);
        Role::create(['name' => 'CONTABILIDAD']);
        Role::create(['name' => 'OPERADOR']);
        Role::create(['name' => 'CLIENTE']);

        Permission::create(['name' => 'Ver dashboard del Admin'])->syncRoles($super_admin);
        Permission::create(['name' => 'Ajustes del sistema'])->syncRoles($super_admin);
        Permission::create(['name' => 'Actualizar Ajustes del sistema'])->syncRoles($super_admin);
        
        Permission::create(['name' => 'Listado de Roles'])->syncRoles($super_admin);
        Permission::create(['name' => 'Crear Rol'])->syncRoles($super_admin);
        Permission::create(['name' => 'Guardar Rol'])->syncRoles($super_admin);
        Permission::create(['name' => 'Ver detalle de Rol'])->syncRoles($super_admin);
        Permission::create(['name' => 'Ver detalle de Permisos de Rol'])->syncRoles($super_admin);
        Permission::create(['name' => 'Actualizar Permisos de Rol']);
        Permission::create(['name' => 'Editar Rol'])->syncRoles($super_admin);
        Permission::create(['name' => 'Actualizar Rol'])->syncRoles($super_admin);
        Permission::create(['name' => 'Eliminar Rol'])->syncRoles($super_admin);

        Permission::create(['name' => 'Listado de Usuarios'])->syncRoles($super_admin);
        Permission::create(['name' => 'Crear Usuario'])->syncRoles($super_admin);
        Permission::create(['name' => 'Guardar Usuario'])->syncRoles($super_admin);
        Permission::create(['name' => 'Ver detalle de Usuario'])->syncRoles($super_admin);
        Permission::create(['name' => 'Editar Usuario'])->syncRoles($super_admin);
        Permission::create(['name' => 'Actualizar Usuario'])->syncRoles($super_admin);
        Permission::create(['name' => 'Eliminar Usuario'])->syncRoles($super_admin);
        Permission::create(['name' => 'Restaurar Usuario'])->syncRoles($super_admin);

        Permission::create(['name' => 'Listado de Categorías'])->syncRoles($super_admin);
        Permission::create(['name' => 'Crear Categoría'])->syncRoles($super_admin);
        Permission::create(['name' => 'Guardar Categoría'])->syncRoles($super_admin);
        Permission::create(['name' => 'Ver detalle de Categoría'])->syncRoles($super_admin);
        Permission::create(['name' => 'Editar Categoría'])->syncRoles($super_admin);
        Permission::create(['name' => 'Actualizar Categoría'])->syncRoles($super_admin);
        Permission::create(['name' => 'Eliminar Categoría'])->syncRoles($super_admin);

        Permission::create(['name' => 'Listado de Productos'])->syncRoles($super_admin);
        Permission::create(['name' => 'Crear Producto'])->syncRoles($super_admin);
        Permission::create(['name' => 'Guardar Producto'])->syncRoles($super_admin);
        Permission::create(['name' => 'Ver detalle de Producto'])->syncRoles($super_admin);
        Permission::create(['name' => 'Gestionar imágenes de Producto'])->syncRoles($super_admin);
        Permission::create(['name' => 'Subir imágenes de Producto'])->syncRoles($super_admin);
        Permission::create(['name' => 'Eliminar imágenes de Producto'])->syncRoles($super_admin);
        Permission::create(['name' => 'Editar Producto'])->syncRoles($super_admin);
        Permission::create(['name' => 'Actualizar Producto'])->syncRoles($super_admin);
        Permission::create(['name' => 'Eliminar Producto'])->syncRoles($super_admin);

        Permission::create(['name' => 'Listado de Pedidos'])->syncRoles($super_admin);
        Permission::create(['name' => 'Crear Pedido'])->syncRoles($super_admin);
        Permission::create(['name' => 'Procesar Pedido'])->syncRoles($super_admin);
    }
}