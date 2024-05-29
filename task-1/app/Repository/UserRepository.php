<?php

namespace App\Repository;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRepository implements UserRepositoryInterface
{

    public function index()
    {
       $users=User::all();
    return view('User.index',compact('users'));
    }

    public function create()
    {
        $roles=Role::all();
        return view('User.create',compact('roles'));
    }

    public function store($request)
    {
        $validated = $request->validated();
        $role=Role::findOrFail($request->role);
        $user=User::create($validated);
        $user->assignRole($role);
        return redirect()->route('user.index');
    }

    public function show($user)
    {
        return view('user.show',$user);
    }

    public function edit($user)
    {
        $roles=Role::all();
       return view('User.edit',compact('user','roles'));
    }

    public function update($request, $user)
    {
        $validated = $request->validated();
        $role=Role::findOrFail($request->role);
        $user->update($validated);
        $user->syncRoles([$role]);

        return redirect()->route('user.index');
    }

    public function destroy($user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
