<?php 
namespace App\Repository;
use App\Models\Category;
use App\Models\Product;
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

    public function store($request)
{        
    $product = new Product();
    
    $product->name_ar = $request->name_ar;
    $product->name_en = $request->name_en;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->category_id = $request->category_id;
   $image_name = $request->file('image')->getClientOriginalName();
   $imagePath = $request->file('image')->storeAs('storage/images', $image_name, 'public');
   $request->file('image')->move('storage/images',$image_name,'public');
  $product->image = '/public/images' . '/'.$image_name;
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