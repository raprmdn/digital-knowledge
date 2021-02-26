<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ArticleRepository implements ArticleRepositoryInterface {

    protected $article;

    public function __construct(Article $article) 
    {
        $this->article = $article;
    }

    public function findAll()
    {
        return $this->article->latest()->get();
    }

    public function findById($id)
    {
        return $this->article->findOrFail($id);
    }

    public function saveData($attribute)
    {

        try {
            $category = Category::findOrFail($attribute['article_category']);
            Tag::findOrFail($attribute['article_tag']);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e->getMessage());
        }

        $slug = Str::slug($attribute['article_title']);

        $thumbnail = $attribute['article_thumbnail'];
        $thumbnailExtensions = $thumbnail->getClientOriginalExtension();
        $thumbnailName = time() . '-' . $slug . ".$thumbnailExtensions";

        $image = Image::make($thumbnail)->resize(1000, 600);
        $image->stream($thumbnailExtensions, 90);
        Storage::disk('public')->put('articles/thumbnail' . '/' . $thumbnailName, $image, 'public');

        $attribute['article_thumbnail']  = 'articles/thumbnail/' . $thumbnailName;

        $article = $this->article->create([
            'article_user_id' => auth()->user()->id,
            'article_category_id' => $category->id,
            'article_title' => $attribute['article_title'],
            'article_slug' => $slug,
            'article_content' => $attribute['article_content'],
            'article_thumbnail' => $attribute['article_thumbnail'],
            'article_status' => $attribute['article_status'] ? 'Publish' : 'Unlisted',
        ]);

        $result = $article->tags()->attach($attribute['article_tag']);

        return $result;
    }

    public function updateData($article, $attribute)
    {

    }

    public function deleteData($article)
    {
        $result = $article->delete();
        return $result;
    }

    public function findArticleByUser($id) 
    {
        return $this->article->where('article_user_id', $id)->latest()->paginate(10);
    }

    public function findBySlug($slug) 
    {
        
    }

}