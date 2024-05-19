<?php

namespace App\Services;
use App\Repositories\ProductRepositoryInterface;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductRepository implements ProductRepositoryInterface
{
    public function create(array $data)
{

    $categoryId = $data['category_id'];

    $product = new Product(['category_id' => $categoryId]);


    foreach ($data['name'] as $locale => $name) {
        $product->translateOrNew($locale)->name = $name;
    }
    foreach ($data['description'] as $locale => $description) {
        $product->translateOrNew($locale)->description = $description;
    }

    // Save the product
    $product->save();

    return $product;
}




    public function update(int $id, array $data)
    {    $categoryId = $data['category_id'];
        $product = Product::findOrFail($id);
        $product->category_id = $categoryId;

    foreach ($data['name'] as $locale => $name) {
        $product->translateOrNew($locale)->name = $name;
    }
    foreach ($data['description'] as $locale => $description) {
        $product->translateOrNew($locale)->description = $description;
    }
        $product->update();
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

    public function validation(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|array',
           'name.*' => 'required|string|max:255',
            'description' => 'required|array',
            'description.*' => 'required|string|min:0',
             'category_id' => 'required|exists:categories,id'
         ]);

     return $validatedData;
    }
}
