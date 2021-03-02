<?php

namespace App\Repositories;

interface ArticleRepositoryInterface extends BaseRepositoryInterface {
    
    public function findArticleByUser($id);
    public function findBySlug($slug);
    public function assignArticleContent($content);
    public function assignArticleThumbnail($thumbnail, $slug);

}