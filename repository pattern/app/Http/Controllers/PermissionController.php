<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\PermissionService;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PermissionController extends Controller implements HasMiddleware
{
    public function __construct(protected PermissionService $permissionService)
    {
    }
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'permission:delete permission',only: ['destroy']),
            new Middleware(middleware: 'permission:update permission',only: ['update','edit']),
            new Middleware(middleware: 'permission:create permission',only: ['store','create']),
            new Middleware(middleware: 'permission:view permission',only: ['index']),
        ];
    }
    public function index()
    {
        return $this->permissionService->index();
    }
    public function create()
    {
        return $this->permissionService->create();
    }
    public function store(PermissionRequest $request)
    {
        $validated = $request->validated();
        return $this->permissionService->store($request);

    }
    public function update(PermissionRequest $request, $id)
    {
        $validated = $request->validated();
        return $this->permissionService->update($request,$id);

    }

    public function edit($id)
    {
        return $this->permissionService->edit($id);

    }

    public function destroy($id)
    {
        return $this->permissionService->destroy($id);

    }
}