<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService
    ) {
    }
    public function index()
    {
        return $this->categoryService->index();

    }



    public function store(CategoryRequest $request)
    {

        $validated = $request->validated();

        return $this->categoryService->store($request);

    }


    public function show(Category $category)
    {
        return $this->categoryService->show($category);

    }


    public function update(CategoryRequest $request, Category $category)
    {
        return $this->categoryService->update($request,$category);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        return $this->categoryService->destroy($category);

    }
}
