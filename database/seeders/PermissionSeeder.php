<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Create users (modify before release)
     * 
     * Adds user permissions
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create task']);
        Permission::create(['name' => 'delete task']);
        Permission::create(['name' => 'create resource']);
        Permission::create(['name' => 'delete resource']);

        $parent_role = Role::create(['name' => 'parent']);
        $parent_role->givePermissionTo('create task');
        $parent_role->givePermissionTo('delete task');
        $parent_role->givePermissionTo('create resource');
        $parent_role->givePermissionTo('delete resource');

        $child_role = Role::create(['name' => 'child']);

        $parent = \App\Models\User::factory()->create([
            'name' => "Admin",
            'email' => "kiancolin.chua@sjcs.edu.ph",
            'password' => Hash::make("Admin123456"),
        ]);
        $parent->assignRole($parent_role);

        $child = \App\Models\User::factory()->create([
            'name' => "Child",
            'email' => "kiancnchua@gmail.com",
            'password' => Hash::make("Child123456"),
        ]);
        

    }
}
