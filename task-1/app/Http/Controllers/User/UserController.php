<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(
    protected UserService $userService
) {
}
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
    public function store(UserRequest $request)
    {
        return $this->userService->store($request);

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $this->userService->show($user);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        return $this->userService->edit($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        return $this->userService->update($request,$user);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return $this->userService->destroy($user);

    }
}
