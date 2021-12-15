<?php

namespace App\Providers;

use App\Contracts\Services\IAvatar;
use App\Contracts\Services\IPolicy;
use App\Services\Avatar;
use App\Services\Policy;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Registered Facedes to be binded into container.
     * 
     * Contract => Class
     *
     * @var array
     */
    private $facades = [
        IPolicy::class => Policy::class,
        IAvatar::class => Avatar::class,
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
