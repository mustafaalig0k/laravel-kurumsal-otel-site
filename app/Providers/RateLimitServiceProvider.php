<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;

class RateLimitServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        RateLimiter::for('registration', function ($job) {
                    return Limit::perHour(100)->by($job->ip());
        });

        RateLimiter::for('login', function ($job) {
                            return Limit::perHour(10)->by($job->ip());
        });

        RateLimiter::for('high-traffic-page', function ($job) {
                            return Limit::perHour(100)->by($job->ip());
        });

    }
}
