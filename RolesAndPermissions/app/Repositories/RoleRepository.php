<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class RoleRepository
{
    public function all(): Collection
    {
        return Role::all();
    }

    public function find($id): ?Role
    {
        return Role::find($id);
    }




        public function create(array $data)
{

    $role = Role::create(['name' => $data['name']]);
        $permissions = Permission::whereIn('id', $data['permission'])->pluck('name');
        $role->syncPermissions($permissions);

return $role;
    }

    public function update($id, array $data)
    {
        $role = Role::find($id);
        $role->name = $data['name'];
        $role->save();
        $permissions = Permission::whereIn('id', $data['permission'])->pluck('name');
        $role->syncPermissions($permissions);
        return $role;

    }

    public function delete($id)
    {
        $role = $this->find($id);
        if (!$role) {
            return false;
        }

        return $role->delete();
    }
}
