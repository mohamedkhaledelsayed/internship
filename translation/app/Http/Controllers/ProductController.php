<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository,CategoryRepositoryInterface $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $products = $this->productRepository->all();
    return view('products.index', compact('products'));
    }

    public function edit(Product $product)
    {
        $categories = $this->categoryRepository->all();
        return view('products.edit', compact('product','categories'));
    }

    public function update(Request $request, Product $product)
    {

        $productData=$this->productRepository->validation($request);
        $this->productRepository->update($product->id,$productData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $this->productRepository->delete($product->id);

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function create()
    {
        $categories = $this->categoryRepository->all();
        return view('products.create', compact('categories'));
    }


public function store(Request $request)
{

    $productData = $this->productRepository->validation($request);


    $this->productRepository->create($productData);

    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}









}




