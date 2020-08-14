<?php

namespace Chenggx\EasyPermission\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['pid', 'name', 'title', 'type', 'order', 'icon', 'method', 'api', 'hidden'];

    protected $casts = [
        'hidden' => 'boolean',
    ];

    const GROUPTYPE = 1;
    const PAGETYPE = 2;
    const BUTTONTYPE = 3;

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission_relation', 'role_id', 'permission_id');
    }
}
