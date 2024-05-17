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

        Category::create($request->all());
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
            $category->update($request->validated());
        return redirect()->route('category.index');


    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index');

    }
}
