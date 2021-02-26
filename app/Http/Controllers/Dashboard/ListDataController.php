<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListDataController extends Controller
{
    
    public function indexDataArticles() 
    {
        $articles = Article::latest()->paginate(10);
        return view('backend.list-article-and-user.articles.index', compact('articles'));
    }

    public function indexDataUsers() 
    {
        return view('backend.list-article-and-user.users.index');
    }

}
