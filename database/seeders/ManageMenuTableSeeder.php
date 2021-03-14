<?php

namespace Database\Seeders;

use App\Models\ManageMenu;
use Illuminate\Database\Seeder;

class ManageMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            ['position' => 1, 'parent_id' => null, 'name' => 'Articles', 'url' => 'articles', 'permission_name' => 'create article', 'icon' => 'icon ni ni-article'],
            ['position' => 2, 'parent_id' => null, 'name' => 'Categories', 'url' => 'categories', 'permission_name' => 'create category', 'icon' => 'icon ni ni-tags-fill'],
            ['position' => 3, 'parent_id' => null, 'name' => 'Tags', 'url' => 'tags', 'permission_name' => 'create tag', 'icon' => 'icon ni ni-tags'],
            ['position' => 4, 'parent_id' => null, 'name' => 'Registration User', 'url' => 'registration-user', 'permission_name' => 'create user', 'icon' => 'icon ni ni-user-add-fill'],
            ['position' => 5, 'parent_id' => null, 'name' => 'Role & Permission', 'url' => 'role-and-permission', 'permission_name' => 'assign permission', 'icon' => 'icon ni ni-tranx'],
            ['position' => 6, 'parent_id' => null, 'name' => 'Menu Management', 'url' => 'menu-management', 'permission_name' => 'menu management', 'icon' => 'icon ni ni-grid-plus'],
            ['position' => 7, 'parent_id' => null, 'name' => 'Data Article & User', 'url' => 'data-article-and-user', 'permission_name' => 'list all', 'icon' => 'icon ni ni-view-list-fill'],
            ['position' => 8, 'parent_id' => null, 'name' => 'Recycle Bin', 'url' => 'recycle-bin', 'permission_name' => 'recycle bin', 'icon' => 'icon ni ni-trash-fill'],
            ['position' => null, 'parent_id' => 1, 'name' => 'Create Article', 'url' => 'menu/dashboard/articles/create', 'permission_name' => 'create article', 'icon' => null],
            ['position' => null, 'parent_id' => 1, 'name' => 'List Article', 'url' => 'menu/dashboard/articles/list-article', 'permission_name' => 'create article', 'icon' => null],
            ['position' => null, 'parent_id' => 2, 'name' => 'Create Category', 'url' => 'menu/dashboard/categories/create', 'permission_name' => 'create category', 'icon' => null],
            ['position' => null, 'parent_id' => 2, 'name' => 'List Category', 'url' => 'menu/dashboard/categories/list-category', 'permission_name' => 'create category', 'icon' => null],
            ['position' => null, 'parent_id' => 3, 'name' => 'Create Tag', 'url' => 'menu/dashboard/tags/create', 'permission_name' => 'create tag', 'icon' => null],
            ['position' => null, 'parent_id' => 3, 'name' => 'List Tag', 'url' => 'menu/dashboard/tags/list-tag', 'permission_name' => 'create tag', 'icon' => null],
            ['position' => null, 'parent_id' => 4, 'name' => 'Registration User', 'url' => 'menu/dashboard/registration-user/create', 'permission_name' => 'create user', 'icon' => null],
            ['position' => null, 'parent_id' => 5, 'name' => 'Roles', 'url' => 'menu/dashboard/role-and-permission/role/create', 'permission_name' => 'assign permission', 'icon' => null],
            ['position' => null, 'parent_id' => 5, 'name' => 'Permissions', 'url' => 'menu/dashboard/role-and-permission/permission/create', 'permission_name' => 'assign permission', 'icon' => null],
            ['position' => null, 'parent_id' => 5, 'name' => 'Assign Permission to Role', 'url' => 'menu/dashboard/role-and-permission/assign/permission-role/create', 'permission_name' => 'assign permission', 'icon' => null],
            ['position' => null, 'parent_id' => 5, 'name' => 'Assign Role to User', 'url' => 'menu/dashboard/role-and-permission/assign/role-user/create', 'permission_name' => 'assign permission', 'icon' => null],
            ['position' => null, 'parent_id' => 6, 'name' => 'List Menu', 'url' => 'menu/dashboard/menu-management/list-menu', 'permission_name' => 'menu management', 'icon' => null],
            ['position' => null, 'parent_id' => 6, 'name' => 'Create Menu', 'url' => 'menu/dashboard/menu-management/menu/create', 'permission_name' => 'menu management', 'icon' => null],
            ['position' => null, 'parent_id' => 7, 'name' => 'Article List', 'url' => 'menu/dashboard/data-article-and-user/article-list', 'permission_name' => 'list all', 'icon' => null],
            ['position' => null, 'parent_id' => 7, 'name' => 'User List', 'url' => 'menu/dashboard/data-article-and-user/user-list', 'permission_name' => 'list all', 'icon' => null],
            ['position' => null, 'parent_id' => 8, 'name' => 'Trash Users', 'url' => 'menu/dashboard/recycle-bin/user', 'permission_name' => 'recycle bin', 'icon' => null],
            ['position' => null, 'parent_id' => 8, 'name' => 'Trash Posts', 'url' => 'menu/dashboard/recycle-bin/article', 'permission_name' => 'recycle bin', 'icon' => null],
        ];

        foreach ( $menus as  $menu ) {
            ManageMenu::create($menu);
        }
    }
}
