<?php

return [
    // 权限缓存后缀
    'permission_cache_suffix' => '_permissions',

    //按钮权限默认缓存时间（单位：天）
    'button_cache_time' => 1,

<<<<<<< HEAD
    // 用户表关联角色表的字段名称
    'role_field'              => 'role_id',

    'router' => [
        //不需要验证权限的路由列表
        'white_list' => [
            //        'auth.login'   //示例：路由名称]
        ],
        //路由地址中间件
        'middleware' => '',
        //路由地址前缀
        'prefix'     => env('API_ROUTE_PREFIX', 'api'),
    ],
];
=======
    //不需要验证权限的路由列表
    'router_permission_list' => [
//        'auth.login'   //示例：路由名称
    ],

    // 用户表关联角色表的字段名称
    'role_field' => 'role_id',
];
>>>>>>> c7c1a2b5982a163e6a95e87de30314a04fed1751
