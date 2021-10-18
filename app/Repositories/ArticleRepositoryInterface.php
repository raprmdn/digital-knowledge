<?php

namespace App\Repositories;

interface ArticleRepositoryInterface extends BaseRepositoryInterface {

    public function findArticleByUser($id);
    public function findBySlug($slug);
    public function findByCategory($id);
    public function findByTags($tag);
    public function showArticleUser($id);
    public function getTotalArticleUser($id);
    public function deleteImageContent($src);

}
