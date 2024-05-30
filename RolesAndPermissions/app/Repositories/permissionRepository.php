<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Permission;

class PermissionRepository
{
    public function all(): Collection
    {
        return Permission::all();
    }

    public function find($id): ?Permission
    {
        return Permission::find($id);
    }

    public function create(array $data): Permission
    {
        return Permission::create($data);
    }

    public function update($id, array $data): bool
    {
        $permission = $this->find($id);
        if (!$permission) {
            return false;
        }

        return $permission->update($data);
    }

    public function delete($id): bool
    {
        $permission = $this->find($id);
        if (!$permission) {
            return false;
        }

        return $permission->delete();
    }
}
