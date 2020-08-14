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
        $groupType = config('easy-permission.permission_type.group');
        $pageType = config('easy-permission.permission_type.page');
        $buttonType = config('easy-permission.permission_type.button');

        return [
            'pid' => "required_if:type,$pageType,$buttonType|integer",
            'title' => 'required|string|min:1|max:10',
            'name' => 'required|string|min:1|max:30',
            'type' => 'required|integer|min:1|max:3',
            'order' => "nullable|required_if:type,$groupType,$pageType|integer",
            'icon' => "nullable|required_if:type,$groupType|string",
            'method' => [
                'nullable',
                "required_if:type,$buttonType",
                'string',
                Rule::in('GET', 'POST', 'PUT', 'PATCH', 'DELETE'),
            ],
            'api' => "nullable|required_if:type,$buttonType|string",
            'hidden' => "required_if:type,$groupType,$pageType|boolean",
        ];
    }
}
