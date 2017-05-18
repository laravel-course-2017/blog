<?php

namespace App\Providers;

use App\Classes\AwesomeClass;
use Illuminate\Support\Facades\View;
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
       /* View::composer('dashboard', function ($view) {
            $view->with('count', 123);
        });*/
       //$admin = Auth::check();

        View::share('isAdmin', false);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Awesome', function ($app) {
            return new AwesomeClass();
        });
    }
}
