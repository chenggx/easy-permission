<?php


namespace Chenggx\EasyPermission\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      => 'required|string|min:1|max:15',
            'remark'    => 'required|string|min:1|max:25',
            'authority' => 'required|array',
        ];
    }
}