<?php

return [
    // 权限缓存后缀
    'permission_cache_suffix' => '_permissions',

    //按钮权限默认缓存时间（单位：天）
    'button_cache_time' => 1,

    // 用户表关联角色表的字段名称
    'role_field' => 'role_id',

    'router' => [
        //不需要验证权限的路由列表
        'white_list' => [
        //'auth.login'   //示例：路由名称
        ],
        'middleware' => ['api', 'auth', 'check-permission'],
        //路由地址前缀
        'prefix' => 'api',
    ],
    // 权限类型
    'permission_type' => [
        'group' => 1,
        'page' => 2,
        'button' => 3,
    ],
];
