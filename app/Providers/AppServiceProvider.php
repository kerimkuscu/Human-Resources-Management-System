<?php

namespace App\Providers;

use Illuminate\Database\Schema\Builder;
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
        Builder::defaultStringLength(191);

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
