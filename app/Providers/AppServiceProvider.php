<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::share('whatsappNumber', config('moly.business.whatsapp'));
        View::share('businessName', config('moly.business.name'));
        View::share('businessTagline', config('moly.business.tagline'));
        View::share('currency', config('moly.currency'));
    }
}
