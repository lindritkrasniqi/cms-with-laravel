<?php

namespace App\Providers;

use App\Facades\Repositories\RolesRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewSeviceProvider extends ServiceProvider
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
            return $view->with(['roles' => RolesRepository::all()]);
        });
    }
}
