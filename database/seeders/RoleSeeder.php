<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Cliente']);

        Permission::create(['name' => 'getProductoCliente', 'description' => 'Ver seccion productos cliente'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'productos.index', 'description' => 'Ver listado de productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'productos.create', 'description' => 'Crear productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'productos.edit', 'description' => 'Editar productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'productos.destroy', 'description' => 'Eliminar productos'])->syncRoles([$role1]);

        Permission::create(['name' => 'categorias.index', 'description' => 'Ver listado de categorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'categorias.create', 'description' => 'Crear categorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'categorias.edit', 'description' => 'Editar categorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'categorias.destroy', 'description' => 'Eliminar categorías'])->syncRoles([$role1]);

        Permission::create(['name' => 'roles.index', 'description' => 'Ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create', 'description' => 'Crear roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.show', 'description' => 'Mostrar el detalle de un rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar roles'])->syncRoles([$role1]);

        Permission::create(['name' => 'users.index', 'description' => 'Ver listado de Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit', 'description' => 'Editar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy', 'description' => 'Eliminar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.ban', 'description' => 'Banear Usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'dolar.index', 'description' => 'Ver Histórico de Dolar'])->syncRoles([$role1]);
        Permission::create(['name' => 'dolar.create', 'description' => 'Añadir nuevo precio'])->syncRoles([$role1]);
        Permission::create(['name' => 'dolar.edit', 'description' => 'Editar histórico del Dolar'])->syncRoles([$role1]);
        Permission::create(['name' => 'dolar.destroy', 'description' => 'Eliminar histórico del Dolar'])->syncRoles([$role1]);

        Permission::create(['name' => 'reporte', 'description' => 'Ver y solicitar reportes'])->syncRoles([$role1]);

        Permission::create(['name' => 'ventas', 'description' => 'Ver el historial de ventas'])->syncRoles([$role1]);
    }
}
