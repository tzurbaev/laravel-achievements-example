<?php

namespace App\Providers;

use App\Criterias\CreateComment;
use App\Criterias\CreatePost;
use App\Criterias\UserSignup;
use Illuminate\Support\ServiceProvider;
use Laravel\Achievements\Facades\Achievements;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Achievements::registerCriterias([
            UserSignup::class, CreateComment::class, CreatePost::class,
        ]);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
