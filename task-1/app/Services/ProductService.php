<?php

namespace App\Services;

use App\Repository\CategoryRepositoryInterface;
use App\Repository\ProductRepositoryInterface;

class ProductService
{
    public function __construct(
        protected ProductRepositoryInterface $productrepository
    ){}
    public function index(){
        return $this->productrepository->index();
    }

    public function create(){
        return $this->productrepository->create();

    }

    public function store($request){
        return $this->productrepository->store($request);

    }

    public function show($id){
        return $this->productrepository->show($id);

    }

    public function edit($id){
        return $this->productrepository->edit($id);

    }

    public function update($request,$id){
        return $this->productrepository->update($request,$id);

    }

    public function destroy($category){
        return $this->productrepository->destroy($category);

    }
}
