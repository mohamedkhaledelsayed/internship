<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\Product\ProductRepositry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

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
        Log::info('Processing product creation...');

    // تحقق من صحة البيانات
    $validatedData = $request->validate([
        'name' => 'required|array',
        'name.*' => 'string|max:255',
        'description' => 'required|array',
        'description.*' => 'string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    Log::info('Validated Data: ', $validatedData);

    // معالجة الصورة إذا كانت موجودة
    $imageName = null;
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        $imageName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $imageName);
    }

    try {
        $productRepo = new ProductRepositry(new Product());
        $product = $productRepo->store($validatedData, $imageName);
        Log::info('Product created successfully.', ['product' => $product]);
        return redirect(route('categories.index'))->with('success', 'تم إنشاء المنتج بنجاح.');
    } catch (\Exception $e) {
        Log::error('Product creation failed: ' . $e->getMessage());
        return redirect()->back()->withErrors(['error' => 'فشل في إنشاء المنتج: ' . $e->getMessage()]);
    }
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
            'name' => 'required',
            // 'name_en' => 'required',
            // 'description_ar' => 'required',
            'description' => 'required',
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
            'description_ar' => $request->input('description_ar'),
            'description_en' => $request->input('description_en'),
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
