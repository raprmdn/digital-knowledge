<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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
    }
}
