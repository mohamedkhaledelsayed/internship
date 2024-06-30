<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RepositryPattern\Interfaces\CategoryInterface;


class CategoryController extends Controller
{
    
    public function __construct(protected CategoryInterface $repo){
    }

    /**
     * Display a listing of the resource.
     */
    public function allCategories()
    {
        $categories = $this->repo->allCategories();
        return view('Pages.store', ['categories'=>$categories]);
    }

    public function getCategory($id)
    {
        return $this->repo->getCategory($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeCategory(Request $request)
    {
        return $this->repo->storeCategory($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCategory(Request $request, $id)
    {
        return $this->repo->updateCategory($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteCategory($id)
    {
        return $this->repo->deleteCategory($id);
    }
}
