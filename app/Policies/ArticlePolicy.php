<?php

namespace App\Policies;

use App\Models\{User, Article};
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Article $article) 
    {
        return $user->id === $article->article_user_id;
    }

    public function delete(User $user, Article $article) 
    {
        return $user->id === $article->article_user_id;
    }
    
}
