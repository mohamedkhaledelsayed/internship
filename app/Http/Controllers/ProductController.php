<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\RepositryPattern\Repositries\ProductRepo;

class ProductController extends Controller
{
    public function __construct(protected ProductRepo $repo){}
    
    public function allProducts()
    {
        return $this->repo->allProducts();
    }
    public function getProduct($id){
        return $this->repo->getProduct($id);
    }
    public function storeProduct(Request $request){
        return $this->repo->storeProduct($request);
    }
    public function updateProduct(Request $request, $id){
        return $this->repo->updateProduct($request, $id);
    }
    public function deleteProduct($id){
        return $this->repo->deleteProduct($id);
    }
}
