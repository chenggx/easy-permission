<?php

namespace Chenggx\EasyPermission;

use Chenggx\EasyPermission\Middleware\CheckRolePermission;
use Illuminate\Support\ServiceProvider;

class EasyPermissionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->publishes([
                __DIR__.'/config/easy-permission.php' => config_path('easy-permission.php'),
        ],'config');

      
            if (! class_exists('CreatePostsTable')) {
              $this->publishes([
                __DIR__ . '/../database/migrations/create_permission_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_permissions_table.php'),
                // 你可以在这里添加更多的迁移
              ], 'migrations');
            }

        }
    }

    public function register()
    {
        app('router')->aliasMiddleware('check-permission', CheckRolePermission::class);
    }
}
