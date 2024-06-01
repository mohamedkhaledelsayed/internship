<?php
namespace app\Repository;

use App\Http\Requests\PreRoleRequest;

interface RoleInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request, $id);

    public function destroy($id);
    public function addPermissionToRole($roleID);

    public function givePermissionToRole(PreRoleRequest $request, $roleID);

}
