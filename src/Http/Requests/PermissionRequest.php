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
        return [
            'pid' => 'required_if:type,2,3|integer',
            'title' => 'required|string|min:1|max:10',
            'name' => 'required|string|min:1|max:30',
            'type' => 'required|integer|min:1|max:3',
            'order' => 'nullable|required_if:type,1,2|integer',
            'icon' => 'nullable|required_if:type,1|string',
            'method' => [
                'nullable',
                'required_if:type,3',
                'string',
                Rule::in('GET', 'POST', 'PUT', 'PATCH', 'DELETE'),
            ],
            'api' => 'nullable|required_if:type,3|string',
            'hidden' => 'required_if:type,1,2|boolean',
        ];
    }
}
