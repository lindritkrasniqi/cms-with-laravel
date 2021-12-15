<?php

namespace App\Providers;

use App\Repositories\RolesRepository;
use App\Repositories\UsersRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{

    /**
     * Register all repositories to bind into controller.
     *
     * @var array
     */
    private $repositories = [
        'users' => UsersRepository::class,
        'roles' => RolesRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindRepositories();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Bind each instance to container.
     *
     * @return void
     */
    private function bindRepositories(): void
    {
        foreach ($this->repositories as $key => $value) {
            $this->app->singleton($key, $value);
        }
    }
}
