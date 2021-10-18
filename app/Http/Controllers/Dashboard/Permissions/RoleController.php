<?php

namespace App\Http\Controllers\Dashboard\Permissions;

use App\Http\Controllers\Controller;
use App\Repositories\RoleRepositoryInterface;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function create()
    {
        $roles = $this->roleRepository->findAll();
        $role = new Role;
        return view('backend.role-and-management.roles.create', compact('roles', 'role'));
    }

    public function store()
    {
        request()->validate([
            'role_name' => 'required|unique:roles,name',
        ]);
        $attribute = request()->all();
        $this->roleRepository->saveData($attribute);

        return redirect()->back()->with('success', 'New Role has been added');
    }

    public function edit(Role $role)
    {
        return view('backend.role-and-management.roles.edit', compact('role'));
    }

    public function update(Role $role)
    {
        request()->validate([
            'role_name' => ['required', Rule::unique('roles', 'name')->ignore($role)],
        ]);
        $attribute = request()->all();
        $this->roleRepository->updateData($role, $attribute);

        return redirect()->route('menu.role.create')->with('success', "Role has been updated");
    }

    public function destroy(Role $role)
    {
        $result = $this->roleRepository->deleteData($role);
        if ($result) {
            return redirect()->back()->with('error', 'Cannot delete this Role!');
        } else {
            return redirect()->back()->with('success', 'Role has been deleted');
        }
    }

}
