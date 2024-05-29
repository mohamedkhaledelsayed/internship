<?php

namespace App\Services;

use App\Models\User;
use App\Repository\RoleRepositoryInterface;

class RoleService
{
    public function __construct(
        protected RoleRepositoryInterface $rolerepository
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



    public function edit($user){

        return $this->rolerepository->edit($user);

    }

    public function update($request,$user){
        return $this->rolerepository->update($request,$user);

    }

    public function destroy($user){
        return $this->rolerepository->destroy($user);

    }

}
