<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function index()
    {
        $categories=Category::with('products')->get();

        return view('Category.index',compact('categories'));

    }

    public function create()
    {
        return view('Category.create');
    }

    public function store($request)
    {

        Category::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name
            ],
            'description'=>$request->description
        ]);
        return redirect()->route('category.index');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('Category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('Category.edit', compact('category'));

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

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index');

    }
}
