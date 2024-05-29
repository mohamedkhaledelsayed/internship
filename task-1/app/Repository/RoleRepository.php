<?php

namespace App\Repository;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{

    public function index()
    {
        $roles=Role::with('permissions')->get();
        return view('Role.index',compact('roles'));
    }

    public function create()
    {
        $permissions=Permission::all();
        return view('Role.create',compact('permissions'));

    }

    public function store($request)
    {

        $validated = $request->validated();

        $permission=Permission::findORfail($validated['permission']);
         $role=Role::create($validated);
         $role->givePermissionTo($permission);
         return redirect('role');
    }

    public function edit($role)
    {
        $permissions=Permission::all();

        return view('Role.edit',compact('role','permissions')) ;

    }

    public function update($request, $role)
    {

        $validated = $request->validated();

        $permission=Permission::findORfail($validated['permission']);
        $role->update($validated);
        $role->givePermissionTo($permission);
        return redirect('role');
    }

    public function destroy($role)
    {
        $users=User::all();

        foreach ($users as $user){
            if ($user->hasExactRoles($role->name)){
                return redirect()->back()->
                withErrors(['error' => 'The role is currently assigned to a user and cannot be deleted.']);
            }
        }
        $role->delete();
        return redirect('role');

    }
}
