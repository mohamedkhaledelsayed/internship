<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_arabic' => 'required|string|max:255',
            'name_english' => 'required|string|max:255'
        ]);

        $this->categoryRepository->create($validatedData);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name_arabic' => 'required|string|max:255',
            'name_english'=>'required|string|max:255',
        ]);

        $this->categoryRepository->update($category->id, $validatedData);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $this->categoryRepository->delete($category->id);

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
