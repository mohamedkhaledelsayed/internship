<?php
namespace App\Services;
use App\Repositories\CategoryRepositoryInterface;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update(int $id, array $data)
    {
        $category = Category::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function delete(int $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }

    public function find(int $id)
    {
        return Category::findOrFail($id);
    }

    public function all()
    {
        return Category::all();
    }
}
