<?php
namespace App\Repository;
use App\Models\Product;
use App\Models\Category;
use App\Traits\ImageTool;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements ProductInterface {


    use ImageTool;

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
        $productData = $request->only([
            'name_ar',
            'name_en',
            'description',
            'price',
            'category_id'
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $this->saveImage($request->file('image'));
            $productData['image'] = $imagePath;
        }
        Product::create($productData);

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
            $oldImagePath = str_replace('/storage/images/', '', $product->image);
            $imagePath = $this->uploadImage($request->file('image'), '', $oldImagePath);
            $data['image'] = $imagePath;
        }
        $product->update($data);
        return response()->json(['message' => 'Product Update successfully!']);

    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            $this->deleteImage(str_replace('/storage/images/', '', $product->image));
        }
        $product->delete();
        return response()->json(['message' => 'Product Deleted successfully!']);
    }
}