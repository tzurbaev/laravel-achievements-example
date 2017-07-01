<?php

namespace App\Criterias;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Zurbaev\Achievements\Achievement;
use Zurbaev\Achievements\AchievementCriteria;
use Zurbaev\Achievements\AchievementCriteriaChange;

class UserLogin
{
    public function type()
    {
        return 'user.login';
    }

    public function handle($owner, AchievementCriteria $criteria, Achievement $achievement, $data = null)
    {
        if ($criteria->hasRequirement('daily')) {
            return $this->handleDailyLogins($owner, $criteria, $achievement, $data);
        }

        return new AchievementCriteriaChange(1, AchievementCriteriaChange::PROGRESS_ACCUMULATE);
    }

    protected function handleDailyLogins($owner, AchievementCriteria $criteria, Achievement $achievement, $data = null)
    {
        Log::debug('[UserLogin@handleDailyLogins] Daily login is processing');

        $progressData = $criteria->progress()->data;
        $lastDay = array_last($progressData);
        $today = Carbon::now();

        if (!empty($lastDay) && $lastDate = Carbon::parse($lastDay)) {
            // Do not update consecutive logins for one day.
            if ($lastDate->format('Y-m-d') === $today->format('Y-m-d')) {
                Log::debug('[UserLogin@handleDailyLogins] Consecutive login', [
                    'lastDate' => $lastDate,
                    'today' => $today,
                ]);
                return null;
            }

            if ($lastDate->diffInDays($today) === 1) {
                $progressData[] = $today->format('Y-m-d H:i:s');
            }

            // User visited at least 2 days in a row, accumulate counter.
            Log::debug('[UserLogin@handleDailyLogins] Row login');
            return new AchievementCriteriaChange(1, AchievementCriteriaChange::PROGRESS_ACCUMULATE, $progressData);
        }

        // If user was online more than 1 day ago, or has no progress data,
        // reset counter to 1, since this is the first day user visits the website.

        Log::debug('[UserLogin@handleDailyLogins] First login');
        return new AchievementCriteriaChange(1, AchievementCriteriaChange::PROGRESS_SET, [
            $today->format('Y-m-d H:i:s')
        ]);
    }
}
