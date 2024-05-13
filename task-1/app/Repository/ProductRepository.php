<?php

namespace App\Repository;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductRepository implements ProductRepositoryInterface
{

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


        $product = new Product();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;


        if ($request->hasfile('image')) {
            $image_name = $request->file('image')->getClientOriginalName();

            $request->file('image')->move('images/',$image_name,'public');
           // $request->file('image')->storAs('images/',$image_name,'public');
            $product->image = '/public/images' . '/'.$image_name;
        }

        $product->save();

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



        if ($request->hasfile('image')) {
            File::delete($product->image);
            $image_name = $request->file('image')->getClientOriginalName();

            $request->file('image')->move('images/',$image_name,'public');

            // $request->file('image')->storAs('images/',$image_name,'public');
            $product->image = '/public/images' . '/'.$image_name;

        }
        $product->name=$request->name;
        $product->price=$request->price;
        $product->category_id= $request->category_id;
        $product->image=$request->image;

        $product->save();
        return redirect()->route('product.index');

    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');

    }
}
