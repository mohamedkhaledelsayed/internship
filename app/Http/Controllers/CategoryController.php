<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use app\Repositories\Category\Categoryinterface;
use App\Repositories\Category\CategoryRepositry;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $categories;
    public function __construct(Category $category)
    {
        $this->categories = $category;
    }
    public function index()
    {
        $categories = $this->categories->all();
        //    dd($categories);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products=Product::all();
        return view('category.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $categoryRepo = new CategoryRepositry(new Category());
        $categoryRepo->store($request->all());
        return to_route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = $this->categories->find($id);
        if (!$category) {
            abort(404);
        }
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            abort(404);
        }

        $category->update([
            'name_ar' => $request->input('name_ar'),
            'name_en' => $request->input('name_en'),
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $category = Category::find($id);
    if (!$category) {
        abort(404);
    }
    $category->delete();
    return back();
}

}
