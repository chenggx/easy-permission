<?php

namespace Chenggx\EasyPermission\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PermissionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $tableName = config('easy-permission.table_names.permissions');

        $groupType = config('easy-permission.permission_type.group');
        $pageType = config('easy-permission.permission_type.page');
        $buttonType = config('easy-permission.permission_type.button');

        $pid = config('easy-permission.table_column_names.permission_table.pid');
        $title = config('easy-permission.table_column_names.permission_table.title');
        $name = config('easy-permission.table_column_names.permission_table.name');
        $type = config('easy-permission.table_column_names.permission_table.type');
        $order = config('easy-permission.table_column_names.permission_table.order');
        $icon = config('easy-permission.table_column_names.permission_table.icon');
        $method = config('easy-permission.table_column_names.permission_table.method');
        $api = config('easy-permission.table_column_names.permission_table.api');
        $hidden = config('easy-permission.table_column_names.permission_table.hidden');

        return [
            $pid => "required_if:type,$pageType,$buttonType|integer",
            $title => 'required|string|min:1|max:10',
//            $name => "required|string|min:1|max:30",
            $name => [
                'required',
                'string',
                'min:1',
                'max:30',
                Rule::unique($tableName, $name)->ignore($this->permission),
            ],
            $type => 'required|integer|min:1|max:3',
            $order => "nullable|required_if:type,$groupType,$pageType|integer",
            $icon => "nullable|required_if:type,$groupType|string",
            $method => [
                'nullable',
                "required_if:type,$buttonType",
                'string',
                Rule::in('GET', 'POST', 'PUT', 'PATCH', 'DELETE'),
            ],
            $api => "nullable|required_if:type,$buttonType|string",
            $hidden => "required_if:type,$groupType,$pageType|boolean",
        ];
    }
}
