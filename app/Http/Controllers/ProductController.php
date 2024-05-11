<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\Product\ProductRepositry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $products;
    public function __construct(Product $product)
    {
        $this->products = $product;
    }
    public function index()
    {
        $products = $this->products->all();
        //    dd($categories);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        $imageName = null; // تعيين القيمة الافتراضية للصورة إلى null

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/'), $imageName);
        }

        $productRepo = new ProductRepositry(new Product());
        $productRepo->store($request->all(), $imageName);

        return redirect(route('categories.index'));
    }



    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = $this->products->find($id);
        if (!$product) {
            abort(404);
        }
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'price' => 'required',
            'category_id' => 'required',

        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile("image")) {
            if (File::exists("image/" . $product->image)) {
                File::delete("image/" . $product->image);
            }
            $file = $request->file("image");
            $product->image = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("/images"), $product->image);
            $request['image'] = $product->image;
        }
        $product->update([

            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'image' => $request->input('image'),
        ]);

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id);

        if (File::exists("images/" . $products->image)) {
            File::delete("images/" . $products->image);
        }


        $products->delete();
        return back();
    }
}
