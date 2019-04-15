<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
        Carbon::serializeUsing(function($carbon) {
            /* @var Carbon $carbon */
            return $carbon->toIso8601String();
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
