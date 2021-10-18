<?php

namespace App\Http\Controllers\Dashboard\Permissions;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    protected $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function create()
    {
        $permissions = $this->permissionRepository->findAll();
        $permission = new Permission;
        return view('backend.role-and-management.permissions.create', compact('permissions', 'permission'));
    }

    public function store()
    {
        request()->validate([
            'permission_name' => 'required|unique:permissions,name',
        ]);

        $attribute = request()->all();

        $this->permissionRepository->saveData($attribute);

        return redirect()->back()->with('success', 'New Permission has been added');
    }

    public function edit(Permission $permission)
    {
        return view('backend.role-and-management.permissions.edit', compact('permission'));
    }

    public function update(Permission $permission)
    {
        request()->validate([
            'permission_name' => ['required', Rule::unique('permissions', 'name')->ignore($permission)],
        ]);

        $attribute = request()->all();
        $this->permissionRepository->updateData($permission, $attribute);

        return redirect()->route('menu.permission.create')->with('success', 'Permission has been updated');
    }

    public function destroy(Permission $permission)
    {
        $this->permissionRepository->deleteData($permission);
        return redirect()->back()->with('success', 'Permission has been deleted');
    }
}
