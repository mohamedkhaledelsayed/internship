<?php

namespace App\RepositryPattern;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductRepo implements ProductsInterface
{

  public function index($category)
    {
        $category = Category::where('name_en', $category)->firstOrFail();
        $products = $category->products()->get();
        return view('product.products', compact('category', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string|min:3|max:25',
            'name_en' => 'required|string|min:3|max:25',
            'description_ar' => 'required',
            'description_en' => 'required',
            'price' => 'required',
            'image' => 'required|image',
            'category_id' => 'required|exists:categories,id',
        ]);
        $imageName = $request->file('image')->getClientOriginalName();
        $imagePath = $request->file('image')->storeAs('storage/images', $imageName, 'public');
        $request->file('image')->move('storage/images',$imageName);
        $category = Category::find($request->category_id);


        if (!$category) {
            return redirect()->back()->withInput()->withErrors(['category_id' => 'Selected category not found.']);
        }
        Product::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'price' => $request->price,
            'image' => $imagePath,
            'category_id' => $category->id
        ]);
        return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product=Product::find($id);
        return view('product.update',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product) {
            $request->validate([
                'name_ar' => 'required|string|min:3|max:25',
                'name_en' => 'required|string|min:3|max:25',
                'description_ar' => 'required',
                'description_en' => 'required',
                'price' => 'required',
                'image' => 'image',
                'category_id' => 'required|exists:categories,id',
            ]);

            $oldImage = $product->image;
            if ($request->hasFile('image')) {
                $imageName = $request->file('image')->getClientOriginalName();
                $imagePath = $request->file('image')->storeAs('storage/images', $imageName, 'public');
            } else {
                $imagePath = $oldImage;
            }

            $product->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'description_ar' => $request->description_ar,
                'description_en' => $request->description_en,
                'price' => $request->price,
                'image' => $imagePath,
                'category_id' => $request->category_id,
            ]);

            if ($oldImage && $request->hasFile('image')) {
                Storage::delete('public/images/' . basename($oldImage));
            }

            return redirect()->route('categories.index');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $product = Product::find($id);

    if ($product) {
        $categoryId = $product->category_id;
        $category = Category::find($categoryId);
        $name=$category->name_en;

        if ($category) {
            $product->delete();
            return redirect()->route('products.index',  $name);
        } else {
            return redirect()->back()->with('error', 'Category not found.');
        }
    } else {
        return redirect()->back()->with('error', 'Product not found.');
    }
}


    }


