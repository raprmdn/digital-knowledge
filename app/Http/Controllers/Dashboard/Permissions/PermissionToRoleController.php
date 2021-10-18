<?php

namespace App\Http\Controllers\Dashboard\Permissions;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PermissionToRoleController extends Controller
{
    public function create()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::get();
        return view('backend.role-and-management.permission-to-role.create', compact('roles', 'permissions'));
    }

    public function store()
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'required|array'
        ]);

        $role = Role::findOrFail(request('role'));
        Permission::findOrFail(request('permissions'));
        $role->givePermissionTo(request('permissions'));

        return redirect()->back()->with('success', "Permission has been assigned to Role $role->name");
    }

    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('backend.role-and-management.permission-to-role.sync', compact('role', 'permissions'));
    }

    public function sync(Request $request, Role $role)
    {
        request()->validate([
            'permissions' => 'required|array',
        ]);

        try {
            $decrypted = Crypt::decrypt($request->id);
            if ($decrypted != $role->id) {
                return redirect()->back()->with('error', "Something went wrong!");
            } else {
                $role->syncPermissions(request('permissions'));
                return redirect()->route('menu.permission.role.create')->with('success', "Permission has been synchronize ro Role {$role->name}.");
            }
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', "Something went wrong.");
        }

    }
}
