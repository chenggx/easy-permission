<?php

namespace Chenggx\EasyPermission\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Chenggx\EasyPermission\Exceptions\InvalidRequestException;

class CheckRolePermission
{
    public function handle($request, Closure $next)
    {
        $whiteList = config('easy-permission.router_permission_list');

        $adminuser = $request->user();

        if (!$adminuser) {
            throw new InvalidRequestException('该中间件必须放在 auth 中间件后面');
        }

        //从缓存中获取登录用户拥有的所有权限
        $permissions = collect(Cache::get($adminuser->id.config('easy-permission.permission_cache_surfix')));
        $currentRouteName = Route::currentRouteName();

//        将用户的权限 name 转换为.的格式
        $permissions = $permissions->map(
            function ($permission) {
                return str_replace('_', '.', Str::snake($permission['name']));
            }
        )->all();

        if (!in_array($currentRouteName, array_merge($whiteList, $permissions))) {
            return response('权限不足', 403);
        }

        return $next($request);
    }
}
