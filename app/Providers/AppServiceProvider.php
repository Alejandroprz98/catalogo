<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
    if (env('APP_ENV') === 'production') {
        Schema::defaultStringLength(191);

        Artisan::command('migrate', function () {
            $this->comment('Migrations disabled in production.');
        });

        Artisan::command('db:seed', function () {
            $this->comment('Seeds disabled in production.');
        });
    }
}

}
