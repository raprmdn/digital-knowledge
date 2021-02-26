<?php

namespace App\Repositories;

use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface {

    protected $permission;

    public function __construct(Permission $permission) 
    {
        $this->permission = $permission;
    }

    public function findAll() 
    {
        return $this->permission->get();
    }

    public function findById($id) 
    {
        return $this->permission->findOrFail($id);
    }

    public function saveData($attribute) 
    {
        $result = $this->permission::create([
            'name' => $attribute['permission_name'],
            'guard_name' => $attribute['guard_name'] ?? 'web',
        ]);

        return $result;
    }

    public function updateData($permission, $attribute)
    {
        $result = $permission->update([
            'name' => $attribute['permission_name'],
            'guard_name' => $attribute['guard_name'] ?? 'web',
        ]);

        return $result;
    }

    public function deleteData($permission)
    {
        $permission = $this->permission->findById($permission->id);
        $permission->delete();

        return $permission;
    }
}