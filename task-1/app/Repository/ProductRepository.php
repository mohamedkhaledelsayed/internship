<?php

namespace App\Repository;


use App\Models\Category;
use App\Models\Product;
use App\Traits\MangeImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements ProductRepositoryInterface
{
    use MangeImage;

    public function index()
    {
        $products = Product::with('Category')->get();
        return view('Product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('Product.create', compact('categories'));
    }

    public function store($request)
    {

        $validated = $request->validated();

        $filepath=$this->addImage($request,'image','public');

        $validated['image'] =  $filepath;

        $create = Product::create($validated);

        return redirect()->route('product.index');

    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('Product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('Product.edit', compact('product', 'categories'));
    }

    public function update($request, $id)
    {

        $product = Product::findOrFail($id);
        $validated = $request->validated();

        $old_image=$product->image;

        if ($request->hasfile('image')){
            $filePath=$this->updateImage($old_image,'image','public');
            $validated['image'] = $filePath;
        }

        $update = $product->update($validated);

        return redirect()->route('product.index');

    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $img=$product->image;
        $this->deleteImage($img,'public');
        $product->delete();

        return redirect()->route('product.index');

    }
}
