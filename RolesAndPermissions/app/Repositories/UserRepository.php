<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
class UserRepository
{
    public function all()
    {
        return User::orderBy('id', 'DESC')->paginate(5);
    }

    public function create($request)
    {

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

    }

    public function find($id)
    {
        return User::find($id);
    }

    public function update($id,$request)
    {
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);


        $user->assignRole($request->input('roles'));
    }
    public function getAllUsers()
    {
        return User::all();
    }

    public function delete($id)
    {
        return User::find($id)->delete();
    }
}
