<?php

return [
    // 权限缓存后缀
    'permission_cache_surfix' => '_permissions',

    //按钮权限默认缓存时间（单位：天）
    'button_cache_time'       => 1,

    //不需要验证权限的路由列表
    'router_permission_list'  => [
//        'auth.login'   //示例：路由名称
    ],

    // 用户表关联角色表的字段名称
    'role_field'              => 'role_id',
];