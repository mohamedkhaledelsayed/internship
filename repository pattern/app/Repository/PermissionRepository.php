<?php
namespace App\Repository;

use App\Repository\PermissionInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionInterface
{
    public function index()
    {
        $permissions = Permission::all();
        return view('permission.index', compact('permissions'));
    }
    public function create()
    {
        return view ('permission.create');
    }

    public function store($request)
    {
        Permission::create([
            'name'=>$request->name
        ]);
        return redirect ('permission')->with('status','Permission created successfully');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
         return view('permission.edit', compact('permission'));
    }

    public function update($request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->update($request->all());
        return redirect()->route('permission.index')->with('status', 'Permission updated successfully');

    }
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()->route('permission.index')->with('status', 'Permission deleted successfully');
    }
}