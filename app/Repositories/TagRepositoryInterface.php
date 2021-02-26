<?php

namespace App\Repositories;

interface TagRepositoryInterface extends BaseRepositoryInterface {
    
    public function findTagByPaginate();
}