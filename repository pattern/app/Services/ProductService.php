<?php

namespace App\Services;

use App\Repository\CategoryInterface;
use App\Repository\ProductInterface;

class ProductService
{
    public function __construct(
        protected ProductInterface $productrepository
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

    public function destroy($category){
        return $this->productrepository->destroy($category);

    }
}