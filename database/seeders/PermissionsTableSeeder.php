<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = collect(['assign permission', 'menu management', 'create article', 'create category', 'create tag', 'list all',
                                'manage posts', 'manage users', 'suspend user', 'permission to role', 'role to user', '	recycle bin', 'create user',
                                'delete permission', 'delete role']);

        $permissions->each(function ($permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        });

        $numbers = collect([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]);
        $numbers->each(function ($number) {
            $role = Role::first();
            $role->givePermissionTo($number);
        });
    }
}
