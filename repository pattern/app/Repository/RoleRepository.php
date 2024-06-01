<?php
namespace App\Repository;

use App\Repository\RoleInterface;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Requests\PreRoleRequest;
use Spatie\Permission\Models\Permission;

class RoleRepository implements RoleInterface
{

    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }
    public function create()
    {
        return view ('role.create');
    }

    public function store($request)
    {
        Role::create([
            'name'=>$request->name
        ]);
        return redirect ('role')->with('status','Role created successfully');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
         return view('role.edit', compact('role'));
    }

    public function update($request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        return redirect()->route('role.index')->with('status', 'Role updated successfully');

    }
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('role.index')->with('status', 'Role deleted successfully');
    }
    public function addPermissionToRole($roleID)
    {
        $permissions = Permission::get();
        $role = Role::find($roleID);
        $rolePermissions = DB::table('role_has_permissions')
                              ->where('role_has_permissions.role_id', $roleID)
                              ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                              ->all();
        return view('role.addPermission', compact('role','permissions','rolePermissions'));
    }

    public function givePermissionToRole(PreRoleRequest $request, $roleID)
    {
        $validated = $request->validated();

        $role = Role::findOrFail($roleID);
        $role->syncPermissions($validated['permissions']);

        return redirect()->back()->with('status', 'Permission added to role');
    }
}
