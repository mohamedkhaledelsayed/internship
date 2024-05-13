<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\SubCategory;
use App\RepositryPattern\CategoriesInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $repo;
    public function __construct(CategoriesInterface $repo){
        $this->repo=$repo;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     return $this->repo->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->repo->create();

    }

    /**
     * Store a newly created resource in storage.
     */
    function store(Request $request){
        return $this->repo->store($request);

    }
    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        return $this->repo->edit($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return $this->repo->update($request,$id);

    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->repo->destroy($id);

}
}
