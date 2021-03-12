<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['category_name' => 'Technology', 'category_slug' => 'technology', 'category_description' => 'Technology description'],
            ['category_name' => 'News', 'category_slug' => 'news', 'category_description' => 'News description'],
            ['category_name' => 'Tutorial', 'category_slug' => 'tutorial', 'category_description' => 'Tutorial description'],
            ['category_name' => 'Investment', 'category_slug' => 'investment', 'category_description' => 'Investment description'],
            ['category_name' => 'Documentation', 'category_slug' => 'documentation', 'category_description' => 'Documentation description'],
            ['category_name' => 'Life', 'category_slug' => 'life', 'category_description' => 'Life description'],
            ['category_name' => 'Business', 'category_slug' => 'business', 'category_description' => 'Business description'],
            ['category_name' => 'Sport', 'category_slug' => 'sport', 'category_description' => 'Sport description'],
            ['category_name' => 'Traveling', 'category_slug' => 'traveling', 'category_description' => 'Traveling description'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
