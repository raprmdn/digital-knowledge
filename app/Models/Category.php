<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_name', 'category_slug', 'category_description'];

    public function articles() 
    {
        return $this->hasMany(Article::class, 'article_category_id');
    }

}
