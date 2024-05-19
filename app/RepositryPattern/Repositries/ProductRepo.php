<?php

namespace App\RepositryPattern\Repositries;

use App\Models\Product;
use App\RepositryPattern\Interfaces\ProductInterface;

class ProductRepo implements ProductInterface{
    
    public function allProducts(){
        return Product::all();
    }

    public function getProduct($id){
        try{
            $product = Product::findOrFail($id);
            return $product;
        }
        catch(Exception $e){
            return response()->json(
                ['message' => 'Product not found']
            );
        }
    }

    public function storeProduct($request){

        try{
            $request = $request->all();
            $product = Product::create($request);
            return $product;
        }
        catch(Exception $e){
            return response()->json(
                ['message' => 'Product not found']
            );
        }
    }
    public function updateProduct($request, $id){
        try{
            $product = Product::findOrFail($id);
            $request = $request->all();
            $product->update($request); // It may result a mass assignment vulnerability
            return $product;
        }
        catch(Exception $e){
            return response()->json(
                ['message' => 'Product not found']
            );
        }
    }
    public function deleteProduct($id){
        try{
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json(
                ['message' => 'Category Deleted Successfully']
            );
        }
        catch(Exception $e){
            return response()->json(
                ['message' => 'Product not found']
            );
        }
    }
}