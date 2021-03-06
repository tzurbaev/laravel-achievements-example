<?php

namespace App\Criterias;

use Illuminate\Support\Facades\Log;
use Zurbaev\Achievements\Achievement;
use Zurbaev\Achievements\AchievementCriteria;
use Zurbaev\Achievements\AchievementCriteriaChange;

class CreateComment
{
    public function type()
    {
        return 'comment.create';
    }

    public function handle($owner, AchievementCriteria $criteria, Achievement $achievement, array $data)
    {
        /**
         * @var \App\Post $post
         */
        $post = array_get($data, 'post');

        if (is_null($post)) {
            return null;
        }

        if ($criteria->hasRequirement('post_min_comments') && $post->comments()->count() < $criteria->requirement('post_min_comments')) {
            Log::debug('[CreateComment@handle] Criteria has a `post_min_comments` requirement, but post does not have such comments.', [
                'required' => $criteria->requirement('post_min_comments'),
                'actual' => $post->comments()->count(),
            ]);

            return null;
        }

        return new AchievementCriteriaChange(1, AchievementCriteriaChange::PROGRESS_ACCUMULATE);
    }
}
