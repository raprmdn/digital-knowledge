<?php

namespace App\Http\Controllers;

use App\Models\{Article, Category, Tag, User};
use Illuminate\Http\Request;
use App\Repositories\{ArticleRepositoryInterface, CategoryRepositoryInterface, TagRepositoryInterface};

class IndexController extends Controller
{

    protected $articleRepository, $categoryRepository, $tagRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository, CategoryRepositoryInterface $categoryRepository, TagRepositoryInterface $tagRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        $articles = $this->articleRepository->findAll();
        $categories = $this->categoryRepository->findAll();
        $tags = $this->tagRepository->findAll();
        return view('index', compact('articles', 'categories', 'tags'));
    }

    public function readArticle(Category $category, Article $article)
    {
        $relatedArticle = Article::where('article_category_id', '=', $article->category->id)
            ->where('id', '!=', $article->id)
            ->with(['author:id,name','category:id,category_name,category_slug'])
            ->latest()
            ->limit(2)
            ->get();
        $categories = $this->categoryRepository->findAll();
        $tags = $this->tagRepository->findAll();
        return view('frontend.blogs.read-article', compact('article', 'relatedArticle', 'categories', 'tags'));
    }

    public function showCategory(Category $category)
    {
        $articles = $this->articleRepository->findByCategory($category->id);
        $categories = $this->categoryRepository->findAll();
        $tags = $this->tagRepository->findAll();
        return view('frontend.blogs.show-category', compact('category', 'articles', 'categories', 'tags'));
    }

    public function showTag(Tag $tag)
    {
        $articles = $this->articleRepository->findByTags($tag);
        $categories = $this->categoryRepository->findAll();
        $tags = $this->tagRepository->findAll();
        return view('frontend.blogs.show-tags', compact('tag', 'articles', 'categories', 'tags'));
    }

    public function showProfile(User $user)
    {
        $articles = $this->articleRepository->showArticleUser($user->id);
        $categories = $this->categoryRepository->findAll();
        $tags = $this->tagRepository->findAll();
        return view('frontend.blogs.show-profile', compact('user', 'articles', 'categories', 'tags'));
    }

}
