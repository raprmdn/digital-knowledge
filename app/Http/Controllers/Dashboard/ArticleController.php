<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Repositories\TagRepositoryInterface;
use App\Repositories\ArticleRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use Carbon\Carbon;

class ArticleController extends Controller
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
        // dd(Carbon::now()->toDateTimeString());
        $id = auth()->user()->id;
        $articles = $this->articleRepository->findArticleByUser($id);
        return view('backend.articles.index', compact('articles'));
    }

    public function create()
    {
        $article = new Article;
        $categories = $this->categoryRepository->findAll();
        $tags = $this->tagRepository->findAll();
        return view('backend.articles.create', compact('article', 'categories', 'tags'));
    }

    public function store(ArticleRequest $request)
    {
        try {
            $attribute = request()->all();
            $this->articleRepository->saveData($attribute);
            return redirect()->back()->with('success', 'Successfully create a new article.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Article $article)
    {
        $this->authorize($article);
        $categories = $this->categoryRepository->findAll();
        $tags = $this->tagRepository->findAll();
        return view('backend.articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        dd(request()->all());
    }

    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        $this->articleRepository->deleteData($article);
        return redirect()->back()->with('success', 'Successfully delete article.');
    }
}
