<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepositoryInterface;

class CategoryController extends Controller
{

    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->findPaginate();
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category;
        return view('backend.categories.create', compact('category'));
    }

    public function store(CategoryRequest $request)
    {
        $attribute = $request->all();
        $this->categoryRepository->saveData($attribute);
        return redirect()->back()->with('success', 'Category has been added.');
    }

    public function edit(Category $category)
    {
        return view('backend.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $attribute = $request->all();
        $this->categoryRepository->updateData($category, $attribute);
        return redirect()->route('menu.category.index')->with('success', 'Category has been updated.');
    }

    public function destroy(Category $category)
    {
        $result = $this->categoryRepository->deleteData($category);
        if ($result) {
            return redirect()->back()->with('error', 'Category has some relation to article. Cannot delete this category.');
        } else {
            return redirect()->back()->with('success', 'Category has been deleted.');
        }
    }
}
