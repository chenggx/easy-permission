<?php

return [
    // 权限缓存后缀
    'permission_cache_suffix' => '_permissions',

    //按钮权限默认缓存时间（单位：天）
    'button_cache_time'       => 1,

    // 用户表关联角色表的字段名称
    'role_field'              => 'role_id',

    'router'          => [
        //不需要验证权限的路由列表
        'white_list' => [
            //'auth.login'   //示例：路由名称
        ],
        'middleware' => ['api', 'auth', 'check-permission'],
        //路由地址前缀
        'prefix'     => 'api',
    ],
    // 权限类型
    'permission_type' => [
        'group'  => 1,
        'page'   => 2,
        'button' => 3,
    ],

    'table_names' => [
        'roles'                    => 'roles',
        'permissions'              => 'permissions',
        'role_permission_relation' => 'role_permission_relation',
    ],

    'table_column_names' => [
        'roles_table'                    => [
            'id'     => 'id',
            'name'   => 'name',
            'remark' => 'remark',
        ],
        'permission_table'               => [
            'id'     => 'id',
            'pid'    => 'pid',
            'title'  => 'title',
            'name'   => 'name',
            'type'   => 'type',
            'order'  => 'order',
            'icon'   => 'icon',
            'method' => 'method',
            'api'    => 'api',
            'hidden' => 'hidden',
        ],
        'role_permission_relation_table' => [
            'id'            => 'id',
            'role_id'       => 'role_id',
            'permission_id' => 'permission_id',
        ],
    ],
];
