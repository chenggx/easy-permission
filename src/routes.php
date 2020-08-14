<?php

<<<<<<< HEAD
Route::namespace('\Chenggx\EasyPermission\Http\Controllers\Api')
    ->prefix(config('easy-permission.router.prefix'))
    ->middleware(['api','auth','check-permission'])
    ->group(
        function () {
            Route::apiResource('role', 'RoleController')->except('show');
            Route::apiResource('permission', 'PermissionController')->except('show');
        }
    );
=======
Route::namespace('\Chenggx\EasyPermission\Http\Controllers\Api')->group(function () {
    Route::get('/role', 'RoleController@index')->name('role.index');              //角色列表
    Route::put('/role/{role}', 'RoleController@update')->name('role.update');     //角色更新
    Route::post('/role', 'RoleController@store')->name('role.store');             //角色新增
    Route::delete('/role/{role}', 'RoleController@destroy')->name('role.destroy'); //删除角色

    Route::post('/authority', 'PermissionController@store')->name('authority.store');                      //权限新增
    Route::put('/authority/{permission}', 'PermissionController@update')->name('authority.update');        //权限更新
    Route::get('/authority', 'PermissionController@index')->name('authority.index');                       //权限列表
    Route::delete('/authority/{permission}', 'PermissionController@destroy')->name('authority.destroy');   //权限删除
});
>>>>>>> c7c1a2b5982a163e6a95e87de30314a04fed1751
