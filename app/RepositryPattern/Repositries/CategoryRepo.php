<?php

namespace App\RepositryPattern\Repositries;

use Exception;
use App\Models\Category;
use App\RepositryPattern\Interfaces\CategoryInterface;

class CategoryRepo implements CategoryInterface{

    public function allCategories(){
        return Category::all();
    }

    public function getCategory($id){
        try{
            $category = Category::findOrFail($id);
            return $category;
        }
        catch(Exception $e){
            return response()->json(
                ['message' => 'Category not found']
            );
        }
    }

    public function storeCategory($request){
        try{
            $request = $request->all();
            $category = Category::create($request);
            return $category;
        }
        catch(Exception $e){
            return response()->json(
                ['message' => 'Category not found']
            );
        }
    }

    public function updateCategory($request, $id){
        try{
            $request = $request->all();
            $category = Category::findOrFail($id);
            $category->update($request); // It may result a mass assignment vulnerability
            return $category;
        }
        catch(Exception $e){
            return response()->json(
                ['message' => 'Category not found']
            );
        }
    }

    public function deleteCategory($id){
        try{
            $category = Category::findOrFail($id);
            $category->delete();
            return \response()->json(
                ['message' => 'Category Deleted Successfully']
            );
        }
        catch(Exception $e){
            return response()->json(
                ['message' => 'Category not found']
            );
        }
    }
}