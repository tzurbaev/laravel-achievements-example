<?php

namespace App\Criterias;

use Zurbaev\Achievements\AchievementCriteriaChange;

class CreateComment
{
    public function type()
    {
        return 'comment.create';
    }

    public function handle()
    {
        return new AchievementCriteriaChange(1, AchievementCriteriaChange::PROGRESS_ACCUMULATE);
    }
}
