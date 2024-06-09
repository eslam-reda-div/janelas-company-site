<?php

namespace App\Providers;

use App\Events\SendEmails;
use App\Events\SendVerifyEmail;
use App\Listeners\SendEmailsListener;
use App\Listeners\SendVerifyEmailListener;
use App\Policies\ActivityPolicy;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;

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
        Event::listen(
            SendEmails::class,
            SendEmailsListener::class,
        );

        Event::listen(
            SendVerifyEmail::class,
            SendVerifyEmailListener::class,
        );

        Gate::policy(Activity::class, ActivityPolicy::class);
    }
}
