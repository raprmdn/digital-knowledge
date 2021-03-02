<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['article_user_id', 'article_category_id', 'article_title', 'article_slug', 
    'article_content', 'article_thumbnail', 'article_status', 'article_view_count', 'created_at', 'edited_at'];

    protected $with = ['author', 'category', 'tags'];

    public function author() 
    {
        return $this->belongsTo(User::class, 'article_user_id');
    }

    public function category() 
    {
        return $this->belongsTo(Category::class, 'article_category_id');
    }

    public function tags() 
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getTakeImageAttribute() {
        return "/storage/" . $this->article_thumbnail;
    }
}
