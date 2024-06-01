<?php
namespace App\Services;

use app\Repository\RoleInterface;

class RoleService
{

    public function __construct(
        protected RoleInterface $rolerepository
    ){}
    public function index(){
        return $this->rolerepository->index();
    }

    public function create(){
        return $this->rolerepository->create();

    }

    public function store($request){
        return $this->rolerepository->store($request);

    }

    public function destroy($category){
        return $this->rolerepository->destroy($category);

    }
    public function edit($id){
        return $this->rolerepository->edit($id);

    }

    public function update($request,$id){
        return $this->rolerepository->update($request,$id);

    }
    public function addPermissionToRole($roleID)
    {
        return $this->rolerepository->addPermissionToRole($roleID);

    }
    public function givePermissionToRole($request, $roleID)
    {
        return $this->rolerepository->givePermissionToRole($request, $roleID);
    }

}
