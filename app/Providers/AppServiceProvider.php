<?php

namespace App\Providers;

use App\Services\Avatar;
use App\Services\Policies;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Registered Facedes to be binded into container.
     *
     * @var array
     */
    private $facades = [
        'policies' => Policies::class,
        'avatar' => Avatar::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindFacades();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bind to container all registered facades.
     *
     * @return void
     */
    private function bindFacades(): void
    {
        foreach ($this->facades as $key => $value) {
            $this->app->bind($key, $value);
        }
    }
}
