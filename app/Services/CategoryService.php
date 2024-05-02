<?php

namespace App\Services;

use App\Repository\CategoryRepositoryInterface;

class CategoryService
{
    public function __construct(
        protected CategoryRepositoryInterface $categoryrepository
    ){}
    public function index(){
        return $this->categoryrepository->index();
    }

    public function create(){
        return $this->categoryrepository->create();

    }

    public function store($request){
        return $this->categoryrepository->store($request);

    }

    public function show($id){
        return $this->categoryrepository->show($id);

    }

    public function edit($id){
        return $this->categoryrepository->edit($id);

    }

    public function update($request,$id){
        return $this->categoryrepository->update($request,$id);

    }

    public function destroy($category){
        return $this->categoryrepository->destroy($category);

    }
}
