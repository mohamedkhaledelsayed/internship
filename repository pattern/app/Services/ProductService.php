<?php

namespace App\Services;

use App\Repository\ProductInterface;
use App\Http\Requests\ProductRequest;
use App\Repository\CategoryInterface;

class ProductService
{
    public function __construct(
        protected ProductInterface $productrepository
    ){}
    public function index(){
        return $this->productrepository->index();
    }

    public function fetch_json(){
        return $this->productrepository->fetch_json();
    }

    public function create(){
        return $this->productrepository->create();

    }

    public function store(ProductRequest $request){
        return $this->productrepository->store($request);
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
