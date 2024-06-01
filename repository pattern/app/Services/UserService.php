<?php
namespace App\Services;

use app\Repository\UserInterface;



class UserService
{

    public function __construct(
        protected UserInterface $userrepository
    ){
    }
    public function index(){
        return $this->userrepository->index();
    }

    public function create(){
        return $this->userrepository->create();

    }

    public function store($request){
        return $this->userrepository->store($request);

    }

    public function destroy($category){
        return $this->userrepository->destroy($category);

    }
    public function edit($id){
        return $this->userrepository->edit($id);

    }

    public function update($request,$id){
        return $this->userrepository->update($request,$id);

    }
}