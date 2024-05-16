<?php

namespace App\Services;
use App\Repositories\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function create(array $data)
    {
        return Product::create($data);
    }


    public function update(int $id, array $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function delete(int $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }

    public function find(int $id)
    {
        return Product::findOrFail($id);
    }

    public function all()
    {
        return Product::all();
    }
    public function validation($request)
    {
        $validatedData = $request->validate([
            'name' => 'required|array',
            'name.en' => 'required|string|max:255',
            'name.ar' => 'required|string|max:255',
            'description' => 'required|array',
            'description.en' => 'required|string|min:0',
             'description.ar' => 'required|string|min:0',
             'category_id' => 'required|exists:categories,id'
         ]);
     $productData = [
         'name' => $request->input('name'),
         'description' => $request->input('description'),
         'category_id' => $request->input('category_id'),
     ];
     return  $productData;
    }
}
