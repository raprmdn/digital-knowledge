<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = collect(['super admin', 'admin', 'moderator', 'writer']);
        $roles->each(function ($role) {
            Role::create([
                'name' => $role,
                'guard_name' => 'web',
            ]);
        });
    }
}
