<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use DOMDocument;
use Exception;
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
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        // Assign Content with all image etc
        $content = $attribute['article_content'];

        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        
        foreach ( $images as $key => $image ) {

            $src = $image->getAttribute('src');

            if ( preg_match('/data:image/', $src) ) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];
                $path = '/articles/content/' . uniqid('', true) . '.' . $mimeType;
                Storage::disk('public')->put($path, file_get_contents($src));
                $newSource = asset('/storage' . $path);
                $image->removeAttribute('src');
                $image->setAttribute('src', $newSource);
                
                // with storage
                // $image->removeAttribute('src');
                // $image->setAttribute('src', Storage::disk('public')->url($path));
            }

        }
        
        $content = $dom->saveHTML();
        
        // Assign Thumbnail For an Article
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
            'article_content' => $content,
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