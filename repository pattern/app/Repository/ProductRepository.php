<?php
namespace App\Repository;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements ProductInterface {

    public function index()
    {
        $products=Product::with('Category')->get();
        $categories = Category::all(); // Get all categories
        return view('Product.index', ['products' => $products
                                     ,'categories'=>$categories]);
    }


    public function fetch_json()
    {
            $products = Product::with('Category')->get();
            return response()->json(['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all(); // Get all categories
        return view('Product.create',compact('categories'));

    }


    public function store(ProductRequest $request)
    {
    $data = $request->only(['name_ar', 'name_en', 'description', 'price', 'category_id']);
    // Handle the image upload
    if ($request->hasFile('image')) {
        $image_name = $request->file('image')->getClientOriginalName();
        $imagePath = $request->file('image')->storeAs('public/images', $image_name);
        $data['image'] = '/storage/images/' . $image_name;
    }

    Product::create($data);

    return response()->json(['message' => 'Product added successfully!']);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
         return response()->json(['status'=>200,
                                        'product'=>$product,
                                        'categories'=>$categories]);
    }

    public function update($request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->only(['name_ar', 'name_en', 'description', 'price', 'category_id']);

       // Handle the image upload
         if ($request->hasFile('image')) {
        $image_name = $request->file('image')->getClientOriginalName();
        $imagePath = $request->file('image')->storeAs('public/images', $image_name);
        $data['image'] = '/storage/images/' . $image_name;
        }

        $product->update($data);
        return response()->json(['message' => 'Product Update successfully!']);

    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product Deleted successfully!']);
    }
}