<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Settings\SchoolSession;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);


        $current_session_data = SchoolSession::select('id', 'session')
            ->where('is_current', true)
            ->first();
        View::share('current_session_data', $current_session_data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
