<?php

namespace App\Repository;

use App\Models\Category;
use App\Models\Product;
class CategoryRepository implements CategoryInterface {
    public function index()
    {
        $categories=Category::with('Products')->get();

        return view('Category.index', ['categories' => $categories]);

    }

    public function create()
    {
        return view('Category.create');
    }

    public function store($request)
    {
        Category::create([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
        ]);
        return redirect()->route('category.index');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index');

    }
    public function update($request, $id)
    {

        $category = Category::findOrFail($id);

        $category->update([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
        ]);
        return redirect()->route('category.index');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('Category.edit', compact('category'));

    }
}
