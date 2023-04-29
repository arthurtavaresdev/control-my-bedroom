<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use tuyapiphp\TuyaApi;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(TuyaApi::class, function () {
            return new TuyaApi(config('services.tuya'));
        });
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
