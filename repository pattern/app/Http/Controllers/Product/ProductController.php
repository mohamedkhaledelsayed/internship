<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        protected ProductService $productService
    ) {
    }
    public function index()
    {
        return $this->productService->index();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->productService->create();

    }

    public function fetch_json()
    {
        return $this->productService->fetch_json();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $validated = $request->validated();
        return $this->productService->store($request);
    }
    /**
     *edit this product
     */
    public function edit($id)
    {
        return $this->productService->edit($id);

    }

    public function update(ProductRequest $request,$id)
    {
        $validated = $request->validated();
        return $this->productService->update($request,$id);
    }
    /**
     * Display the specified resource.
     */

    public function destroy($id)
    {
        return $this->productService->destroy($id);

    }
}
