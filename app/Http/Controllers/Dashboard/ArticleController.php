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
            $attribute = $request->all();
            $this->articleRepository->saveData($attribute);
            return redirect()->back()->with('success', 'Successfully create a new article.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function edit(Article $article)
    {
        $this->authorize($article);
        $categories = $this->categoryRepository->findAll();
        $tags = $this->tagRepository->findAll();
        return view('backend.articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'article_title' => ['required', 'min:10'],
            'article_content' => ['required', 'min:250'],
            'article_thumbnail' => ['mimes:jpeg,jpg,png', 'max:5000'],
            'article_category' => ['required'],
            'article_tag' => ['required', 'max:5', 'array'],
        ]);

        try {
            $attribute = $request->all();

            if ( $request->file('article_thumbnail') ) {
                $attribute['article_thumbnail'] = $request->article_thumbnail;
            } else {
                $attribute['article_thumbnail'] = null;
            }
            $this->articleRepository->updateData($article, $attribute);

            return redirect()->route('menu.article.index')->with('success', 'Successfully update the article.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        $this->articleRepository->deleteData($article);
        return redirect()->back()->with('success', 'Successfully delete article.');
    }

    public function deleteContentImage()
    {
        $src = request('src');
        $this->articleRepository->deleteImageContent($src);
        return response()->json('success');
    }
}
