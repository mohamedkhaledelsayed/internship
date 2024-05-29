<?php

namespace App\Services;

use App\Models\User;

use App\Repository\UserRepositoryInterface;

class UserService
{
    public function __construct(
        protected UserRepositoryInterface $userrepository
    ){}
    public function index(){
        return $this->userrepository->index();
    }

    public function create(){
        return $this->userrepository->create();

    }

    public function store($request){
        return $this->userrepository->store($request);

    }

    public function show($user){
        return $this->userrepository->show($user);

    }

    public function edit($user){

        return $this->userrepository->edit($user);

    }

    public function update($request,$user){
        return $this->userrepository->update($request,$user);

    }

    public function destroy($user){
        return $this->userrepository->destroy($user);

    }

}
