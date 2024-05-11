<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\Categoryinterface;

class CategoryRepositry implements Categoryinterface
{
    public function index()
    {
        return $categories = Category::all();
        // Implement index method
    }

    public function show($id)
    {
        // Implement show method
    }

    public function create()
    {
        // Implement create method
    }

    public function store(array $data)
    {
        return Category::create([
            'name_ar' => $data['name_ar'],
            'name_en' => $data['name_en'],
        ]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if (!$category) {
            abort(404);
        }
        return $category;
    }

    public function update(array $data, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            abort(404);
        }

        $category->update([
            'name_ar' => $data['name_ar'],
            'name_en' => $data['name_en'],
        ]);

        return $category;
    }
    public function destroy($id)
    {

        $category = Category::find($id);
        if (!$category) {
            abort(404);
        }
        $category->delete();
    }
}
