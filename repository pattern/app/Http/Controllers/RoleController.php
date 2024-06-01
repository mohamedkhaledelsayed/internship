<?php

namespace App\Http\Controllers;
use App\Services\RoleService;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\PreRoleRequest;
use Illuminate\Support\Facades\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class RoleController extends Controller implements HasMiddleware
{
    public function __construct(protected RoleService $roleService)
    {

    }
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'permission:delete role',only: ['destroy']),
            new Middleware(middleware: 'permission:update role',only: ['update','edit','addPermissionToRole','givePermissionToRole']),
            new Middleware(middleware: 'permission:create role',only: ['store','create']),
            new Middleware(middleware: 'permission:view role',only: ['index']),
        ];
    }
      public function index()
    {
        return $this->roleService->index();
    }
    public function create()
    {
        return $this->roleService->create();
    }
    public function store(RoleRequest $request)
    {
        $validated = $request->validated();
        return $this->roleService->store($request);

    }
    public function update(RoleRequest $request, $id)
    {
        $validated = $request->validated();
        return $this->roleService->update($request,$id);

    }

    public function edit($id)
    {
        return $this->roleService->edit($id);

    }

    public function destroy($id)
    {
        return $this->roleService->destroy($id);

    }
    public function addPermissionToRole($roleID)
    {
        return $this->roleService->addPermissionToRole($roleID);

    }

    public function givePermissionToRole(PreRoleRequest $request, $roleID)
    {
        return $this->roleService->givePermissionToRole($request,$roleID);
    }

}