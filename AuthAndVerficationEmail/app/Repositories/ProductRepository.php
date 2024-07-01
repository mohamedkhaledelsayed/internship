<?php


namespace App\Repositories;

use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;



class ProductRepository implements ProductRepositoryInterface
{

    public function all()
    {
        return Product::all();
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(array $data, $productId)
    {
        $product = Product::find($productId);
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return $product;
    }

    public function find($id)
    {
        return Product::findOrFail($id);
    }
}
