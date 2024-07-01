<?php

namespace App\RepositryPattern;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductRepo implements ProductsInterface
{

  public function index($category)
    {
        $categories = Category::all();
        $category = Category::find($category);
        $products = $category->products;
        return view('product.products', compact('categories','category', 'products'));

    }

    public function fetchProducts()
    {
        $products = Product::with('category')->get();
        return response()->json(['products' => $products]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'category_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->messages()]);
        } else {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->image = $request->image;
            $product->category_id = $request->category_id;
            $product->save();
            return response()->json(['status' => 200, 'message' => 'Product Added Successfully']);
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json(['status' => 200, 'product' => $product]);
        } else {
            return response()->json(['status' => 404, 'message' => 'Product Not Found']);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|max:191',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|url',
            'category_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->messages()]);
        } else {
            $product = Product::find($id);
            if ($product) {
                $product->name = $request->name;
                $product->description = $request->description;
                $product->price = $request->price;
                $product->image = $request->image;
                $product->category_id = $request->category_id;
                $product->save();
                return response()->json(['status' => 200, 'message' => 'Product Updated Successfully']);
            } else {
                return response()->json(['status' => 404, 'message' => 'Product Not Found']);
            }
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['status' => 200, 'message' => 'Product Deleted Successfully']);
        } else {
            return response()->json(['status' => 404, 'message' => 'Product Not Found']);
        }
    }








}

    /**
     * Show the form for creating a new resource.
     */
//     public function create()
//     {
//         $categories = Category::all();
//         return view('product.create',compact('categories'));
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'name_ar' => 'required|string|min:3|max:25',
//             'name_en' => 'required|string|min:3|max:25',
//             'description_ar' => 'required',
//             'description_en' => 'required',
//             'price' => 'required',
//             'image' => 'required|image',
//             'category_id' => 'required|exists:categories,id',
//         ]);
//         $imageName = $request->file('image')->getClientOriginalName();
//         $imagePath = $request->file('image')->storeAs('storage/images', $imageName, 'public');
//         $request->file('image')->move('storage/images',$imageName);
//         $category = Category::find($request->category_id);


//         if (!$category) {
//             return redirect()->back()->withInput()->withErrors(['category_id' => 'Selected category not found.']);
//         }
//         Product::create([
//             'name_ar' => $request->name_ar,
//             'name_en' => $request->name_en,
//             'description_ar' => $request->description_ar,
//             'description_en' => $request->description_en,
//             'price' => $request->price,
//             'image' => $imagePath,
//             'category_id' => $category->id
//         ]);
//         return redirect()->route('categories.index');

//     }

//     /**
//      * Display the specified resource.
//      */
//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit($id)
//     {
//         $categories = Category::all();
//         $product=Product::find($id);
//         return view('product.update',compact('product','categories'));
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, $id)
//     {
//         $product = Product::find($id);

//         if ($product) {
//             $request->validate([
//                 'name_ar' => 'required|string|min:3|max:25',
//                 'name_en' => 'required|string|min:3|max:25',
//                 'description_ar' => 'required',
//                 'description_en' => 'required',
//                 'price' => 'required',
//                 'image' => 'image',
//                 'category_id' => 'required|exists:categories,id',
//             ]);

//             $oldImage = $product->image;
//             if ($request->hasFile('image')) {
//                 $imageName = $request->file('image')->getClientOriginalName();
//                 $imagePath = $request->file('image')->storeAs('storage/images', $imageName, 'public');
//             } else {
//                 $imagePath = $oldImage;
//             }

//             $product->update([
//                 'name_ar' => $request->name_ar,
//                 'name_en' => $request->name_en,
//                 'description_ar' => $request->description_ar,
//                 'description_en' => $request->description_en,
//                 'price' => $request->price,
//                 'image' => $imagePath,
//                 'category_id' => $request->category_id,
//             ]);

//             if ($oldImage && $request->hasFile('image')) {
//                 Storage::delete('public/images/' . basename($oldImage));
//             }

//             return redirect()->route('categories.index');
//         }
//     }


//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy($id)
// {
//     $product = Product::find($id);

//     if ($product) {
//         $categoryId = $product->category_id;
//         $category = Category::find($categoryId);
//         $name=$category->name_en;

//         if ($category) {
//             $product->delete();
//             return redirect()->route('products.index',  $name);
//         } else {
//             return redirect()->back()->with('error', 'Category not found.');
//         }
//     } else {
//         return redirect()->back()->with('error', 'Product not found.');
//     }
// }


//     }


