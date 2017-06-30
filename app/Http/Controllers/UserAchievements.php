<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAchievements extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $achievements = $request->user()->achievements()->orderBy('achievementables.completed_at', 'desc')->get();
        $points = $request->user()->achievementPoints();

        return view('user-achievements', compact('achievements', 'points'));
    }
}
