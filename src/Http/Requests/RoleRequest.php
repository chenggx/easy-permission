<?php

namespace Chenggx\EasyPermission\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $permissionTableName = config('easy-permission.table_names.permissions');
        $permissionTableIdColumn = config('easy-permission.table_column_names.permission_table.id');
        $id = config('easy-permission.table_column_names.roles_table.id');
        $name = config('easy-permission.table_column_names.roles_table.name');
        $remark = config('easy-permission.table_column_names.roles_table.remark');

        return [
            $name      => 'required|string|min:1|max:15',
            $remark    => 'required|string|min:1|max:25',
            'authority' => [
                'required',
                'array',
                "exists:$permissionTableName,$permissionTableIdColumn"
            ],
        ];
    }
}
