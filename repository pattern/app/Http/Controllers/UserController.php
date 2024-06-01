<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class UserController extends Controller implements HasMiddleware
{

    public function __construct( protected UserService $userService)
    {
    }
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'permission:delete user',only: ['destroy']),
            new Middleware(middleware: 'permission:update user',only: ['update','edit']),
            new Middleware(middleware: 'permission:create user',only: ['store','create']),
            new Middleware(middleware: 'permission:view user',only: ['index']),
        ];
    }
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->userService->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->userService->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( UserRequest $request)
    {
        return $this->userService->store($request);

    }
       /**
     * Update a user with the given request data and ID.
     *
     * @param UserRequest $request The request containing the updated user data.
     * @param int $id The ID of the user to update.
     * @return mixed The result of the update operation.
     */
    public function update(UserRequest $request, $id)
    {
        $validated = $request->validated();
        return $this->userService->update($request,$id);

    }

    public function edit($id)
    {
        return $this->userService->edit($id);

    }
    public function destroy($id)
    {
        return $this->userService->destroy($id);

    }
}