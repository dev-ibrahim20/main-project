<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\PersonalAccessTokenRepository;
use Laravel\Sanctum\Sanctum;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
