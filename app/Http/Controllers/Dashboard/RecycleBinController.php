<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecycleBinController extends Controller
{
    
    public function articleTrash() 
    {
        $articles = Article::onlyTrashed()->paginate(10);
        return view('backend.recycle-bin.articles.index', compact('articles'));
    }

    public function userTrash() 
    {
        return view('backend.recycle-bin.user.index');
    }

    public function articleRestore($article) 
    {
        $article = Article::onlyTrashed()->first();
        $article->restore();

        return redirect()->back()->with('success', 'Article has been restored.');
    }

}
