<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Str;


class CategoryRepository implements CategoryRepositoryInterface {

    protected $category;

    public function __construct(Category $category) 
    {
        $this->category = $category;
    }

    public function findAll()
    {
        return $this->category->with(['articles' => function($q) {
            $q->where('article_status', 'Publish')->latest()->with('author:id,name', 'category:id,category_name');
        }])->get();
    }

    public function findById($id)
    {
        return $this->category->findOrFail($id);
    }

    public function saveData($attribute)
    {
        $attribute['category_slug'] = Str::slug($attribute['category_name']);
        
        $result = $this->category->create([
            'category_name' => $attribute['category_name'],
            'category_slug' => $attribute['category_slug'],
            'category_description' => $attribute['category_description'],
        ]);

        return $result;
    }

    public function updateData($category, $attribute)
    {
        $attribute['category_slug'] = Str::slug($attribute['category_name']);
        $result = $category->update([
            'category_name' => $attribute['category_name'],
            'category_slug' => $attribute['category_slug'],
            'category_description' => $attribute['category_description'],
        ]);

        return $result;
    }

    public function deleteData($category)
    {
        $this->category->has('articles')->get();
        if ( $category->articles()->exists() ) {
            return true;
        } else {
            $category->delete();
            return false;
        }
    }

    public function findPaginate() 
    {
        return $this->category->paginate(10);
    }

}