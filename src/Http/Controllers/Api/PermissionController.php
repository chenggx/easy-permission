<?php

namespace Chenggx\EasyPermission\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Chenggx\EasyPermission\Models\Permission;
use Chenggx\EasyPermission\Resources\Permission as PermissionResource;
use Chenggx\EasyPermission\Http\Requests\PermissionRequest;
use Chenggx\EasyPermission\Exceptions\InternalException;
use Chenggx\EasyPermission\Exceptions\InvalidRequestException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PermissionController extends Controller
{
    /**
     * permission list.
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $list = Permission::all();

        $res = makeTree(PermissionResource::collection($list)->toArray($request));

        return response()->json([
            'code' => 0,
            'message' => 'success',
            'data' => $res
        ]);
    }

    /**
     * create permission.
     *
     * @return PermissionResource
     *
     * @throws InternalException
     */
    public function store(PermissionRequest $request)
    {
        return $request->validated();
        $res = Permission::create($request->validated());

        if (!$res) {
            throw new InternalException('权限新增-数据库操作失败');
        }

        return response()->json([
            'code' => 0,
            'message' => 'success',
            'data' => new PermissionResource($res)
        ]);
    }

    /**
     * update permission.
     *
     * @param $id
     *
     * @return PermissionResource
     *
     * @throws InternalException
     */
    public function update($id, PermissionRequest $request)
    {
        $permission = Permission::query()->where('id', $id)->first();

        if (!$permission) {
            throw new ModelNotFoundException();
        }

        $res = $permission->update($request->validated());

        if (!$res) {
            throw new InternalException('权限更新-数据库操作失败');
        }

        return response()->json([
            'code' => 0,
            'message' => 'success',
            'data' => new PermissionResource($permission)
        ]);
    }

    /**
     * destroy permission.
     *
     * @param $id
     *
     * @return int
     *
     * @throws InternalException
     * @throws InvalidRequestException
     */
    public function destroy($id)
    {
        $permission = Permission::query()->where('id', $id)->first();

        if (!$permission) {
            throw new ModelNotFoundException();
        }
        //判断是否还有子权限
        $hasSonPermission = Permission::query()->where('pid', $permission->id)->exists();

        if ($hasSonPermission) {
            throw new InvalidRequestException('请先删除子权限');
        }

        $res = $permission->delete();

        if (!$res) {
            throw new InternalException('权限删除-数据库操作失败');
        }

        return response()->json([
            'code' => 0,
            'message' => 'success',
            'data' => $res
        ]);
    }
}
