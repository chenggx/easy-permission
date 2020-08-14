<h1 align="center"> easy-permission </h1>

<p align="center"> 一个 api 级的权限管理包。</p>

![StyleCI build status](https://github.styleci.io/repos/284004928/shield) 

该扩展包主要功能是提供 API 权限验证的。前端项目配合该接口可以实现按钮级的权限管理。

## 安装方法

```shell
$ composer require chenggx/easypermission -vvv

# 发布配置文件
$ php artisan vendor:publish --provider="Chenggx\EasyPermission\EasyPermissionServiceProvider"

```

## 使用方法

1. 在用户模型中添加 UserPermission Trait.
2. 参考配置文件 easy-permission 中的 role_field，根据项目情况进行修改


## 备注

配置文件 easy-permission 中的配置参考文件中的注释

路由中间件为 check-permission 必须放在登录有验证中间件后面

UserPermission Trait 中的方法

1. role()                   获取 role 模型数据
2. menus()                  获取所有菜单权限.
3. buttons()                从缓存获取所有按钮权限，如果不存在怎从数据库中获取并写入缓存.
4. menusTree()              返回树状格式的菜单列表.
5. clearPermissionCache()    清楚当前用户的权限缓存

## License

MIT