<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

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
        // Eloquent settings.
        Model::shouldBeStrict(! $this->app->isProduction());

        // Force HTTPS when in production.
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Default password rules.
        Password::defaults(function () {
            $rules = Password::min(8);

            return $this->app->isProduction()
                ? $rules->letters()->mixedCase()->numbers()->symbols()
                : $rules;
        });
    }
}
