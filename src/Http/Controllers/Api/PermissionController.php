<?php


namespace Chenggx\EasyPermission\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Chenggx\EasyPermission\Models\Permission;
use Chenggx\EasyPermission\Resources\Permission as PermissionResource;
use Chenggx\EasyPermission\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    /**
     * 权限树
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $list = Permission::all();

        return makeTree(PermissionResource::collection($list)->toArray($request));
    }

    public function store(PermissionRequest $request)
    {
        $res = Permission::create($request->validated());

        if (!$res) {
//            throw new InternalException('权限新增-数据库操作失败');
        }

        return new PermissionResource($res);
    }

    public function update($id, PermissionRequest $request)
    {
        $permission = Permission::query()->where('id',$id)->first();
        $res = $permission->update($request->validated());

        if (!$res) {
            //throw new InternalException('权限更新-数据库操作失败');
        }

        return new PermissionResource($permission);
    }
}