<h1 align="center"> easy-permission </h1>

<p align="center"> A permission role control package.</p>


## Installing

```shell
$ composer require chenggx/easy-permission -vvv

Admin-users 表必须有role_id 字段

AdminUser 模型里添加 UserPermission 的 trait 后自动关联 Role 模型，使用->role 获取角色模型数据

路由中间件为 check-permission 必须放在登录有验证中间件后面

```

## Usage



## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/chenggx/easyPermission/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/chenggx/easyPermission/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT