<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search()
    {
        $query = request('search_query');
        $articles = Article::where("article_title", "ilike", "%$query%")
                    ->with('author:id,name,username', 'category:id,category_name,category_slug')
                    ->latest()->paginate(10);
        $categories = Category::get();
        $tags = Tag::get();
        return view('frontend.blogs.search-result', compact('articles', 'categories', 'tags'));
    }

    public function searchArticleByUser()
    {
        $query = request('query');
        $id = auth()->user()->id;
        $articles = Article::where("article_title", "ilike", "%$query%")->where('article_user_id', $id)
                    ->with('author', 'category', 'tags')
                    ->latest()->paginate(10);
        return view('backend.articles.index', compact('articles'));
    }

    public function searchArticle()
    {
        $query = request('query');
        $articles = Article::where("article_title", "ilike", "%$query%")
                    ->with('author', 'category', 'tags')
                    ->latest()->paginate(10);
        return view('backend.list-article-and-user.articles.index', compact('articles'));
    }

    public function searchUser()
    {
        $query = request('query');
        $users = User::where("username", "ilike", "%$query%")->latest()->paginate(10);
        return view('backend.list-article-and-user.users.index', compact('users'));
    }

    public function searchTrashedArticle()
    {
        $query = request('query');
        $articles = Article::onlyTrashed()->where("article_title", "ilike", "%$query%")->latest()->paginate(10);
        return view('backend.recycle-bin.articles.index', compact('articles'));
    }

}
