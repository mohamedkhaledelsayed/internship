<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;


use App\Http\Requests\RoleRequest;
use App\Models\User;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use function Laravel\Prompts\error;

class RoleController extends Controller
{
    public function __construct(
    protected RoleService $roleService
) {
}

    public function index()
    {
        return $this->roleService->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->roleService->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {

        return $this->roleService->store($request);

    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return $this->roleService->edit($role);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request,Role $role)
    {
        return $this->roleService->update($request,$role);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        return $this->roleService->destroy($role);
    }
}
