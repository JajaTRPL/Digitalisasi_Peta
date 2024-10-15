<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'tambah-admin']);
        Permission::create(['name' => 'edit-admin']);
        Permission::create(['name' => 'hapus-admin']);
        Permission::create(['name' => 'lihat-admin']);

        Permission::create(['name' => 'tambah-map']);
        Permission::create(['name' => 'edit-map']);
        Permission::create(['name' => 'hapus-map']);
        Permission::create(['name' => 'lihat-map']);

        Role::create(['name' => 'superAdmin']);
        Role::create(['name' => 'admin']);

        $roleSuperAdmin = Role::findByName('superAdmin');
        $roleSuperAdmin -> givePermissionTo('tambah-admin');
        $roleSuperAdmin -> givePermissionTo('edit-admin');
        $roleSuperAdmin -> givePermissionTo('hapus-admin');
        $roleSuperAdmin -> givePermissionTo('lihat-admin');

        $roleSuperAdmin -> givePermissionTo('tambah-map');
        $roleSuperAdmin -> givePermissionTo('edit-map');
        $roleSuperAdmin -> givePermissionTo('hapus-map');
        $roleSuperAdmin -> givePermissionTo('lihat-map');

        $roleAdmin = Role::findByName('admin');
        $roleAdmin -> givePermissionTo('tambah-map');
        $roleAdmin -> givePermissionTo('edit-map');
        $roleAdmin -> givePermissionTo('hapus-map');
        $roleAdmin -> givePermissionTo('lihat-map');
    }
}
