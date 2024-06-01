<?php
namespace App\Services;

use App\Repository\PermissionInterface;

class PermissionService
{

    public function __construct(
        protected PermissionInterface $permissionrepository
    ){}
    public function index(){
        return $this->permissionrepository->index();
    }

    public function create(){
        return $this->permissionrepository->create();

    }

    public function store($request){
        return $this->permissionrepository->store($request);

    }

    public function destroy($category){
        return $this->permissionrepository->destroy($category);

    }
    public function edit($id){
        return $this->permissionrepository->edit($id);

    }

    public function update($request,$id){
        return $this->permissionrepository->update($request,$id);

    }
}
