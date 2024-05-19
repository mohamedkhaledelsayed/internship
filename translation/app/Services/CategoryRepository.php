<?php
namespace App\Services;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function create(array $data)
    {
        $category = new Category();
        foreach ($data['name'] as $locale => $name) {
            $category->translateOrNew($locale)->name = $name;
        }
        $category->save();
        return $category;
    }

    public function update(int $id, array $data)
    {
        $category = Category::findOrFail($id);
        foreach ($data['name'] as $locale => $name) {
            $category->translateOrNew($locale)->name = $name;
        }

        // $category->save();
        // return $category;
        $category->update();
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


    public function validation(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|array',
            'name.*' => 'required|string'
        ]);

        return $validatedData;
    }
}
