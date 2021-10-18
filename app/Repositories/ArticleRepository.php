<?php

namespace App\Repositories;

use App\Traits\ContentTrait;
use App\Traits\ImageTrait;
use DOMDocument;
use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleRepository implements ArticleRepositoryInterface {

    use ImageTrait, ContentTrait;

    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function findAll()
    {
        return $this->article
            ->published()
            ->with(['author:id,name,username', 'category:id,category_name,category_slug'])
            ->latest()
            ->paginate(15);
    }

    public function findById($id)
    {
        return $this->article->findOrFail($id);
    }

    public function saveData($attribute)
    {
        $category = Category::findOrFail($attribute['article_category']);
        Tag::findOrFail($attribute['article_tag']);

        // Assign Content with all image etc
        $contentArticle = $attribute['article_content'];
        $content = $this->assignArticleContent($contentArticle);

        // Assign Slug Article
        $slug = Str::slug($attribute['article_title']);

        // Assign Thumbnail For an Article
        $thumbnail = $attribute['article_thumbnail'];
        $thumbnailName = $this->assignArticleThumbnail('articles/thumbnail', $thumbnail, $slug);
        $attribute['article_thumbnail']  = 'articles/thumbnail/' . $thumbnailName;

        $article = auth()->user()->articles()->create([
            'article_category_id' => $category->id,
            'article_title' => $attribute['article_title'],
            'article_slug' => $slug,
            'article_content' => $content,
            'article_thumbnail' => $attribute['article_thumbnail'],
            'article_status' => $attribute['article_status'] ? 'Publish' : 'Unlisted',
        ]);

        return $article->tags()->attach($attribute['article_tag']);
    }

    public function updateData($article, $attribute)
    {
        $category = Category::findOrFail($attribute['article_category']);
        Tag::findOrFail($attribute['article_tag']);

        // Assign Content
        $contentArticle = $attribute['article_content'];
        $content = $this->assignArticleContent($contentArticle);

        // Assign Thumbnail and Slug
        $slug = Str::slug($attribute['article_title']);
        $thumbnail = $attribute['article_thumbnail'];

        // Check thumbnail if exists
        if ( $thumbnail ) {
            Storage::delete($article->article_thumbnail);
            $thumbnailName = $this->assignArticleThumbnail('articles/thumbnail', $thumbnail, $slug);
            $attribute['article_thumbnail'] = 'articles/thumbnail/' . $thumbnailName;
        } else {
            $attribute['article_thumbnail'] = $article->article_thumbnail;
        }
        $attribute['edited_at'] = Carbon::now();

        $article->update([
            'article_category_id' => $category->id,
            'article_title' => $attribute['article_title'],
            'article_slug' => $slug,
            'article_content' => $content,
            'article_thumbnail' => $attribute['article_thumbnail'],
            'article_status' => $attribute['article_status'] ? 'Publish' : 'Unlisted',
            'edited_at' => $attribute['edited_at'],
        ]);

        return $article->tags()->sync($attribute['article_tag']);
    }

    public function deleteData($article)
    {
        return $article->delete();
    }

    public function findArticleByUser($id)
    {
        return $this->article->where('article_user_id', $id)
            ->with(['author:id,name,username', 'category:id,category_name,category_slug', 'tags'])
            ->latest()
            ->paginate(10);
    }

    public function findBySlug($slug)
    {
        return $this->article->where('article_slug', $slug)
            ->with(['author', 'category', 'tags'])
            ->first();
    }

    public function findByCategory($id)
    {
        return $this->article->where('article_category_id', $id)
            ->published()
            ->with(['author:id,name,username', 'category:id,category_name,category_slug'])
            ->latest()
            ->paginate(10);
    }

    public function findByTags($tag)
    {
        return $tag->articles()->with(['author:id,name,username', 'category:id,category_name,category_slug'])
            ->published()
            ->latest()->paginate(10);
    }

    public function showArticleUser($id)
    {
        return $this->article->where('article_user_id', $id)
            ->published()
            ->with(['author:id,name,username', 'category:id,category_name,category_slug'])
            ->latest()
            ->paginate(15);
    }

    public function getTotalArticleUser($id)
    {
        return $this->article->where('article_user_id', $id)->select('id')->get();
    }

    public function deleteImageContent($src): bool
    {
        $path = asset('/storage');
        $file_name = str_replace($path, '', $src);
        return Storage::delete($file_name);
    }
}
