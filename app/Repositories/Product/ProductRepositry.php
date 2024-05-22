<?php

namespace App\Repositories\Product;

use App\Repositories\Product\Productinterface;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

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
            'price' => $data['price'],
            'image' => $imageName,
            'category_id' => $data['category_id'],
        ]);

        foreach (config('translatable.locales') as $locale) {
            Log::info('Processing locale: ' . $locale);
            if (isset($data['name'][$locale])) {
                Log::info('Setting name and description for locale: ' . $locale);
                $product->translateOrNew($locale)->name = $data['name'][$locale];
                $product->translateOrNew($locale)->description = $data['description'][$locale];
            }
        }

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
            'description_ar' => $data['description_ar'],
            'description_en' => $data['description_en'],
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
