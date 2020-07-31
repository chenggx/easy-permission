<?php


namespace Chenggx\EasyPermission\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Chenggx\EasyPermission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $list = Role::query()->with('permissions')->get();

        $list->each(function ($item) {
            $item['authority'] = $item->permissions->pluck('id');
            unset($item['permissions']);
        });

        return $list;
    }


}