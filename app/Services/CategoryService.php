<?php 
namespace App\Services;

use App\Repository\CategoryInterface;

class CategoryService
{
    public function __construct(
        protected CategoryInterface $categoryrepository
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

    public function destroy($category){
        return $this->categoryrepository->destroy($category);

    }
}