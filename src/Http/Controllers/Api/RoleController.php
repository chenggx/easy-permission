<?php

namespace Chenggx\EasyPermission\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Chenggx\EasyPermission\Models\Role;
use Chenggx\EasyPermission\Http\Requests\RoleRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Chenggx\EasyPermission\Exceptions\InternalException;

class RoleController extends Controller
{
    /**
     * role list.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $list = Role::query()->with('permissions')->get();

        $list->each(function ($item) {
            $item['authority'] = $item->permissions->pluck('id');
            unset($item['permissions']);
        });

        return response()->json($list);
    }

    /**
     * create role.
     *
     * @return mixed
     *
     * @throws InternalException
     */
    public function store(RoleRequest $request)
    {
        $res = DB::transaction(function () use ($request) {
            $role = Role::create($request->validated());
            $role->permissions()->sync($request->authority);

            return $role;
        });

        if (!$res) {
            throw new InternalException('创建角色-数据库操作失败');
        }

        return response()->json($res);
    }

    /**
     * update role.
     *
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed|object|null
     *
     * @throws InternalException
     */
    public function update($id, RoleRequest $request)
    {
        $role = Role::query()->where('id', $id)->first();

        if (!$role) {
            throw new ModelNotFoundException();
        }

        $role = DB::transaction(function () use ($request, $role) {
            $role->permissions()->sync($request->authority);
            $role->update($request->validated());

            return $role;
        });

        $role['authority'] = $role->permissions->pluck('id');

        if (!$role) {
            throw new InternalException('更新角色-数据库操作失败');
        }

        return response()->json($role);
    }

    /**
     * destroy role and permission-relation.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws InternalException
     */
    public function destroy($id)
    {
        $role = Role::query()->where('id', $id)->first();

        if (!$role) {
            throw new ModelNotFoundException();
        }
        // 同时删除角色附带的权限
        $res = DB::transaction(function () use ($role) {
            $role->permissions()->detach();

            return $role->delete();
        });

        if (!$role) {
            throw new InternalException('删除角色-数据库操作失败');
        }

        return response()->json(true);
    }
}
