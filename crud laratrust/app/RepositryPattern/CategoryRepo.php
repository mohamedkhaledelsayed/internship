<?php

namespace App\RepositryPattern;

use Illuminate\Http\Request;
use App\Models\Category;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoryRepo implements CategoriesInterface
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {{ LaravelLocalization::getCurrentLocale(); }}
        $categories=Category::all();
        return view("categories",compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');

    }

    /**
     * Store a newly created resource in storage.
     */
    function store(Request $request){
        $data = $request->all();
        $category = new Category();

        foreach (config('translatable.locales') as $locale) {
            $category->translateOrNew($locale)->name = $data['name'][$locale];
        }

        $category->save();

        return redirect()->route('categories.index');
    }
    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('update',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category=Category::find($id);
        $data = $request->all();

        foreach (config('translatable.locales') as $locale) {
            $category->translateOrNew($locale)->name = $data['name'][$locale];
        }

        $category->save();

        return redirect()->route('categories.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
          if ($category) {
             $category->delete();
             return redirect()->route('categories.index');
    }
    else {
    return redirect()->back()->with('error', 'category not found.');
    }
}
}
