<?php

namespace Chenggx\EasyPermission;

use Chenggx\EasyPermission\Middleware\CheckRolePermission;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class EasyPermissionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->publishes(
            [
                __DIR__.'/config/easy-permission.php' => config_path('easy-permission.php'),
            ]
        );

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('check-permission', CheckRolePermission::class);
    }

    public function register()
    {
    }
}
