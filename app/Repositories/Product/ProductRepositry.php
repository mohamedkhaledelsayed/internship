<?php

namespace App\Repositories\Product;

use App\Repositories\Product\Productinterface;
use App\Models\Product;

class ProductRepositry implements Productinterface
{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function index()
    {
        // Implement index method
    }

    public function show($id)
    {
        // Implement show method
    }

    public function create()
    {
        // Implement create method
    }
    public function store(array $data, string $imageName)
    {
        $product = new Product([
            'name_ar' => $data['name_ar'],
            'name_en' => $data['name_en'],
            'price' => $data['price'],
            'image' => $imageName, // استخدم اسم الصورة المحملة هنا
            'category_id' => $data['category_id'],
        ]);

        $product->save();

        return $product;
    }


    public function edit($id)
    {
        // Implement edit method
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        return $product;
    }

    public function update(array $data, $id,  $imageName)
    {
        $product = $this->product->findOrFail($id);

        $product->update([

            'name_ar' => $data['name_ar'],
            'name_en' => $data['name_en'],
            'price' => $data['price'],
            'category_id' => $data['category_id'],
            'image' => $imageName,

        ]);
        return $product->save(); 
    }

    public function destroy($id, $data)
    {
        // Implement destroy method
    }
}
