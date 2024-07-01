<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Repositories\ProductRepositoryInterface;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        $products = $this->productRepository->all();

        return response()->json($products);
    }

    public function show($productId)
    {
        $product = $this->productRepository->find($productId);

        if ($product) {
            return response()->json($product);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }

    public function store(StoreProductRequest $request)
    {
        $product = $this->productRepository->create($request->all());
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }
    public function update(UpdateProductRequest $request, $productId)
    {
        $product = $this->productRepository->update($request->all(), $productId);

        if ($product) {
            return response()->json([
                'message' => 'Product updated successfully',
                'product' => $product
            ], 200);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }

    public function destroy($productId)
    {
        $product =$this->productRepository->delete($productId);
        if ($product) {
            return response()->json([
                'message' => 'Product deleted successfully',
                'product' => $product
            ], 200);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}
