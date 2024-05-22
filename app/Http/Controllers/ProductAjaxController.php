<?php

namespace App\Http\Controllers;

use App\Models\ProductAjax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = ProductAjax::all();
        return view('ajax.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("image/"), $imageName);
        
            $product = new ProductAjax([
                'name' => $request->input('name'),
                'descripation' => $request->input('descripation'),
                'price' => $request->input('price'),
                'image' => $imageName,
                'category' => $request->input('category'),
            ]);
            $product->save();
        
            return response()->json([
                'status' => 200, 
                'success' => 'Product saved successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 400, 
                'error' => 'Image file is missing.'
            ]);
        }
        
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = ProductAjax::find($id);
        if ($product) {
            return response()->json($product);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
  
        public function update(Request $request, $id)
{
    $product = ProductAjax::find($id);

    if ($product) {
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("image/"), $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->input('name');
        $product->descripation = $request->input('descripation');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        $product->save();

        return response()->json([
            'status' => 200,
            'success' => 'Product updated successfully.'
        ]);
    } else {
        return response()->json([
            'status' => 404,
            'error' => 'Product not found.'
        ]);
    }
}

   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $product = ProductAjax::find($id);
    
        if ($product) {
            if (Storage::delete('public/image/' . $product->image)) {
                ProductAjax::destroy($id);
                return response()->json(['status' => 200, 'message' => 'Product deleted successfully.']);
            } else {
                return response()->json(['status' => 500, 'message' => 'Failed to delete product image.']);
            }
        } else {
            return response()->json(['status' => 404, 'message' => 'Product not found.']);
        }
    }
    
    
}
