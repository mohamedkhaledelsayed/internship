<?php

namespace App\Http\Controllers\Category;

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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     return $this->categoryService->index();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->categoryService->create();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {

        $validated = $request->validated();

        return $this->categoryService->store($request);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->categoryService->show($id);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->categoryService->edit($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        return $this->categoryService->update($request,$id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->categoryService->destroy($id);

    }
}
