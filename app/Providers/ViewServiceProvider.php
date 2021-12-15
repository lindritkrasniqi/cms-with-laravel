<?php

namespace App\Providers;

use App\Facades\Repositories\Roles;
use App\Facades\Services\Policy;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('partials.roles.*', function ($view) {
            return $view->with(['roles' => Roles::roles()]);
        });

        View::composer('partials.policies', function ($view) {
            return $view->with(['policies' => Policy::all()]);
        });
    }
}
