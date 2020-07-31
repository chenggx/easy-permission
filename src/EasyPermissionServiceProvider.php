<?php


namespace Chenggx\EasyPermission;

use Illuminate\Support\ServiceProvider;

class EasyPermissionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

    public function register()
    {

    }
}