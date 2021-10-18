<?php

namespace App\Http\Controllers\Dashboard\ManageMenu;

use App\Http\Controllers\Controller;
use App\Models\ManageMenu;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class ManageMenuController extends Controller
{

    public function index()
    {
        $menuLists = ManageMenu::with('children')->where('parent_id', null)->orderBy('position')->get();
        $menuTables = ManageMenu::with('parent')->whereNotNull('parent_id', null)->get();
        return view('backend.menu-management.list', compact('menuLists', 'menuTables'));
    }

    public function create()
    {
        $permissions = Permission::get();
        $parents = ManageMenu::where('parent_id', null)->get();
        return view('backend.menu-management.create', compact('permissions', 'parents'));
    }

    public function store()
    {
        request()->validate([
            'permission' => 'required',
            'menu_name' => 'required',
            'menu_position' => 'nullable|numeric|min:1',
        ]);

        $attr = request('parent_menu');
        if ($attr) {
            ManageMenu::where('id', request('parent_menu'))->firstOrFail();
        }
        Permission::where('name', request('permission'))->firstOrFail();

        ManageMenu::create([
            'position' => request('menu_position') ?? null,
            'parent_id' => request('parent_menu') ?? null,
            'name' => request('menu_name'),
            'url' => request('url') ?? null,
            'permission_name' => request('permission'),
            'icon' => request('menu_icon') ?? null,
        ]);

        return redirect()->back()->with('success', 'Successfully added new menu.');
    }

    public function edit(ManageMenu $menu)
    {
        $permissions = Permission::get();
        $parents = ManageMenu::where('parent_id', null)->get();
        return view('backend.menu-management.edit', compact('menu', 'permissions', 'parents'));
    }

    public function update(ManageMenu $menu)
    {
        request()->validate([
            'parent_menu' => 'required',
            'permission' => 'required',
            'menu_name' => 'required',
            'url' => 'required',
        ]);

        $menu->update([
            'parent_id' => request('parent_menu'),
            'permission_name' => request('permission'),
            'name' => request('menu_name'),
            'url' => request('url'),
        ]);

        return redirect()->route('menu.menu.list')->with('success', 'Sub Menu has been updated.');
    }

    public function editMainMenu(ManageMenu $menu)
    {
        $permissions = Permission::get();
        return view('backend.menu-management.main-edit', compact('menu', 'permissions'));
    }

    public function updateMainMenu(ManageMenu $menu)
    {
        request()->validate([
            'permission' => 'required',
            'menu_name' => 'required',
            'menu_position' => 'required',
            'menu_icon' => 'required',
            'url' => 'required',
        ]);

        $menu->update([
            'permission_name' => request('permission'),
            'name' => request('menu_name'),
            'position' => request('menu_position'),
            'icon' => request('menu_icon'),
            'url' => request('url'),
        ]);

        return redirect()->route('menu.menu.list')->with('success', 'Main Menu has been updated.');
    }

    public function destroy(ManageMenu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.menu.list')->with('success', 'Menu has been deleted.');
    }

}
