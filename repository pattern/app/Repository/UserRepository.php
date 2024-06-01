<?php
namespace App\Repository;

use App\Models\User;
use App\Repository\UserInterface;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserRepository implements UserInterface
{
    public function index()
    {
        $users = User::get();
        return view('user.index',compact('users'));
    }
    public function create()
    {
        $roles =Role::pluck('name','name')->all();
        return view('user.create',compact('roles'));
    }

    public function store( UserRequest $request)
    {

        $validated = $request->validated();
        $user = User::create($validated);
        $user->syncRoles($request->input('roles'));
        return redirect('/users')->with('status', 'User created successfully!');
    }

    public function edit($id)
    {
        $roles =Role::pluck('name','name')->all();
         $user = User::findOrFail($id);
         $userRoles = $user->roles->pluck('name','name')->all();
         return view('user.edit', compact('user','roles','userRoles'));

    }

    public function update($request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->syncRoles($request->input('roles'));
        return redirect('/users')->with('status', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users')->with('status', 'User deleted successfully');
    }
}