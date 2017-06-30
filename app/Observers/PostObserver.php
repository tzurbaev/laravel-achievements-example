<?php

namespace App\Observers;

use App\Post;
use Laravel\Achievements\Facades\Achievements;

class PostObserver
{
    /**
     * @param Post $post
     */
    public function created(Post $post)
    {
        Achievements::criteriaUpdated($post->user, 'post.create', ['post' => $post]);
    }
}
