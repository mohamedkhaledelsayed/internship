<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use App\RepositryPattern\ProductsInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $repo;
public function __construct(ProductsInterface $repo){
    $this->repo = $repo;
}
    /**
     * Display a listing of the resource.
     */
    public function index($category){
        return $this->repo->index($category);
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
    public function store(Request $request)
    {
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
    public function update(Request $request,$id)
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

