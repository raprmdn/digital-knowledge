<?php

namespace App\Http\Controllers;

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
        $categories = $this->categoryRepository->findAll();
        return view('index', compact('categories'));
    }

}
