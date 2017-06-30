<?php

namespace App\Criterias;

use Zurbaev\Achievements\AchievementCriteriaChange;

class CreatePost
{
    public function type()
    {
        return 'post.create';
    }

    public function handle()
    {
        return new AchievementCriteriaChange(1, AchievementCriteriaChange::PROGRESS_ACCUMULATE);
    }
}
