<?php

namespace App\Repositories;

use Exception;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface {

    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function findById($id) 
    {
        return $this->role->findOrFail($id);
    }

    public function findAll() 
    {
        return $this->role->get();
    }

    public function saveData($attribute) 
    {
        $result = $this->role::create([
            'name' => $attribute['role_name'],
            'guard_name' => $attribute['guard_name'] ?? 'web',
        ]);
        return $result;
    }

    public function updateData($role, $attribute) 
    {
        $result = $role->update([
            'name' => $attribute['role_name'],
            'guard_name' => $attribute['guard_name'] ?? 'web',
        ]);
        return $result;
    }

    public function deleteData($role) 
    {
        $this->role->has('users')->get();
        if ( $role->users()->first() ) {
            return true;
        } else {
            $role->delete();
            return false;
        }
    }

}