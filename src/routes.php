<?php

Route::namespace('\Chenggx\EasyPermission\Http\Controllers\Api')
    ->prefix(config('easy-permission.router.prefix'))
    ->middleware(config('easy-permission.router.middleware'))
    ->group(
        function () {
            Route::apiResource('role', 'RoleController')->except('show');
            Route::apiResource('permission', 'PermissionController')->except('show');
        }
    );
