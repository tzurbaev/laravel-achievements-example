<?php

namespace App\Criterias;

use Zurbaev\Achievements\AchievementCriteriaChange;

class UserSignup
{
    public function type()
    {
        return 'user.signup';
    }

    public function handle()
    {
        return new AchievementCriteriaChange(1, AchievementCriteriaChange::PROGRESS_ACCUMULATE);
    }
}
