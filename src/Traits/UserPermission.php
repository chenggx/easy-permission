<?php

namespace Chenggx\EasyPermission\Traits;

use Chenggx\EasyPermission\Models\Role;
use Illuminate\Support\Facades\Cache;
use Chenggx\EasyPermission\Models\Permission;

trait UserPermission
{
    /**
     * 关联角色模型
     * @return mixed
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    /**
     * 获取所有菜单权限
     * @return mixed
     */
    public function menus()
    {
        $permissions = $this->role->permissions;

        return $permissions->where('type', '<>', Permission::BUTTONTYPE);
    }

    /**
     * 从缓存获取所有按钮权限，如果不存在怎从数据库中获取并写入缓存
     * @return mixed
     */
    public function buttons()
    {
        $key = $this->id.config('easy-permission.permission_cache_surfix');

        $btns = Cache::get(
            $key,
            function () use ($key) {
                $permissions = $this->role->permissions;
                $res = $permissions->where('type', Permission::BUTTONTYPE);
                Cache::put($key, $res, now()->addDays(config('easy-permission.button_cache_time')));

                return $res;
            }
        );

        return $btns;
    }

    /**
     * 返回树状格式的菜单列表
     * @return array
     */
    public function menusTree()
    {
        return makeTree($this->menus()->toArray());
    }
}