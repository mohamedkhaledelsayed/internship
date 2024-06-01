<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class CategoryController extends Controller implements HasMiddleware
{

    public function __construct(
        protected CategoryService $categoryService
    ) {
    }
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'permission:delete category',only: ['destroy']),
            new Middleware(middleware: 'permission:update category',only: ['update','edit']),
            new Middleware(middleware: 'permission:create category',only: ['store','create']),
            new Middleware(middleware: 'permission:view category',only: ['index']),
        ];
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

    public function update(CategoryRequest $request, $id)
    {
        return $this->categoryService->update($request,$id);

    }

    public function edit($id)
    {
        return $this->categoryService->edit($id);

    }

    public function destroy($id)
    {
        return $this->categoryService->destroy($id);

    }
}