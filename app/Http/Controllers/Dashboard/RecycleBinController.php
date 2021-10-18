<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class RecycleBinController extends Controller
{

    public function articleTrash()
    {
        $articles = Article::onlyTrashed()->paginate(10);
        return view('backend.recycle-bin.articles.index', compact('articles'));
    }

    public function articleRestore()
    {
        $article = Article::onlyTrashed()->first();
        $article->restore();

        return redirect()->back()->with('success', 'Article has been restored.');
    }

    public function destroy()
    {
        $article = Article::onlyTrashed()->first();

        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $dom->loadHTML($article->article_content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach ( $images as $key => $image ) {

            $path = asset('/storage');
            $src = $image->getAttribute('src');
            $image_name = str_replace($path, '', $src);
            Storage::delete($image_name);

        }
        Storage::delete($article->article_thumbnail);
        $article->tags()->detach();
        $article->forceDelete();

        return redirect()->back()->with('success', 'Article has been delete permanently');
    }

}
