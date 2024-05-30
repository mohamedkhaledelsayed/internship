<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;


class UserController extends Controller
{

    protected $userRepository;


    function __construct()
    {
        $this->middleware(['permission:user-list|user-create|user-edit|user-delete'], ['only' => ['index', 'store']]);
        $this->middleware(['permission:user-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:user-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:user-delete'], ['only' => ['destroy']]);

        $this->userRepository = new userRepository();

    }
    public function index()
    {
        $data =     $this->userRepository->all();
        return view('users.index',compact('data'));
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
    
        $this->userRepository->create($request);
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    public function show($id)
    {
        $user = $this->userRepository->find($id);
        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $user =  $this->userRepository->find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $this->userRepository->update($id,$request);

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    public function destroy($id)
    {
        $this->userRepository->delete($id);
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
