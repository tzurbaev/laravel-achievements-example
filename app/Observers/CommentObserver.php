<?php

namespace App\Observers;

use App\Comment;
use Laravel\Achievements\Facades\Achievements;

class CommentObserver
{
    /**
     * @param Comment $comment
     */
    public function created(Comment $comment)
    {
        Achievements::criteriaUpdated($comment->user, 'comment.create', ['comment' => $comment]);
    }
}
