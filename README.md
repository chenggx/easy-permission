<h1 align="center"> easy-permission </h1>

<p align="center"> A permission role control package.</p>
![StyleCI build status](https://github.styleci.io/repos/284004928/shield) 

该扩展包主要功能是提供 API 权限验证的。前端配合该接口可以实现按钮级的权限。

## Installing

```shell
$ composer require chenggx/easy-permission -vvv

# 发布配置文件
$ php artisan vendor:publish --provider="Chenggx\EasyPermission\EasyPermissionServiceProvider"

```

## Usage

AdminUser 模型里添加 UserPermission 的 trait 后自动关联 Role 模型，使用->role 获取角色模型数据

路由中间件为 check-permission 必须放在登录有验证中间件后面

## License

MIT