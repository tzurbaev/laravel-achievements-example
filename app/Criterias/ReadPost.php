<?php

namespace App\Criterias;

use Zurbaev\Achievements\Achievement;
use Zurbaev\Achievements\AchievementCriteria;
use Zurbaev\Achievements\AchievementCriteriaChange;

class ReadPost
{
    public function type()
    {
        return 'post.read';
    }

    /**
     * @param $owner
     * @param AchievementCriteria $criteria
     * @param Achievement $achievement
     * @param array $data
     * @return AchievementCriteriaChange|null
     */
    public function handle($owner, AchievementCriteria $criteria, Achievement $achievement, array $data)
    {
        /**
         * @var \App\Post $post
         */
        $post = array_get($data, 'post');

        if (is_null($post)) {
            return null;
        }

        if ($criteria->hasRequirement('min_comments') && $post->comments()->count() < $criteria->requirement('min_comments')) {
            return null;
        }

        return new AchievementCriteriaChange(1, AchievementCriteriaChange::PROGRESS_ACCUMULATE);
    }
}
