<?php

Route::namespace('\Chenggx\EasyPermission\Http\Controllers\Api')
    ->prefix(config('easy-permission.router.prefix'))
    ->middleware(['api', 'auth', 'check-permission'])
    ->group(
        function () {
            Route::apiResource('role', 'RoleController')->except('show');
            Route::apiResource('permission', 'PermissionController')->except('show');
        }
    );
