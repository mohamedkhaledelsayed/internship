<?php
namespace App\Repository;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements ProductInterface {

     // Function to get all products with their associated categories
    public function index()
    {
        $products=Product::with('Category')->get();

        return view('Product.index', ['products' => $products]);

    }
    // Function to create a new product
    public function create()
    {
        $categories = Category::all(); // Get all categories
        return view('Product.create',compact('categories'));
    }


    public function store(ProductRequest $request)
    {
        $data = $request->only(['name_ar', 'name_en', 'description', 'price', 'category_id']);

        $image_name = $request->file('image')->getClientOriginalName();
        $imagePath = $request->file('image')->storeAs('storage/images', $image_name, 'public');
        $request->file('image')->move('storage/images',$image_name,'public');
        $data['image'] = '/storage/images' . '/'.$image_name;

        Product::create($data);

        return redirect()->route('product.index');
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

        $data = $request->only(['name_ar', 'name_en', 'description', 'price', 'category_id']);

        $image_name = $request->file('image')->getClientOriginalName();
        $imagePath = $request->file('image')->storeAs('storage/images', $image_name, 'public');
        $request->file('image')->move('storage/images',$image_name,'public');
        $data['image'] = '/storage/images' . '/'.$image_name;

        $product->update($data);
        return redirect()->route('product.index');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}