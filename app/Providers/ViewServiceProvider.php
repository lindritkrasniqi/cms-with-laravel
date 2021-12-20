<?php

namespace App\Providers;

use App\Facades\Repositories\Roles;
use App\Facades\Services\Policy;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
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
        $this->registerDirectives();

        $this->shareDataWithViews();
    }

    /**
     * Register all custom directives.
     *
     * @return void
     */
    private function registerDirectives(): void
    {
        Blade::if('cananyof', function (array $abilities, array $models) {
            foreach ($models as $model) {
                if (Gate::any($abilities, $model)) return true;
            }

            return false;
        });
    }

    /**
     * Share data with views.
     *
     * @return void
     */
    private function shareDataWithViews(): void
    {
        View::composer('partials.roles.*', function ($view) {
            return $view->with(['roles' => Roles::roles()]);
        });

        View::composer('partials.policies', function ($view) {
            return $view->with(['policies' => Policy::all()]);
        });
    }
}
