<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Achievements\AchievementModel;

class UserAchievements extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        /**
         * @var \Illuminate\Database\Eloquent\Collection $userAchievements
         */
        $points = $request->user()->achievementPoints();
        $userAchievements = $request->user()->achievements()->orderBy('achievementables.completed_at', 'desc')->get()->keyBy('id');
        $achievements = AchievementModel::all()
            ->reject(function (AchievementModel $achievement) use ($userAchievements) {
                return $userAchievements->has($achievement->id);
            });

        return view('user-achievements', compact('achievements', 'userAchievements', 'points'));
    }
}
