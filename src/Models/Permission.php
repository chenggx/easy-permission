<?php

namespace Chenggx\EasyPermission\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['pid', 'name', 'title', 'type', 'order', 'icon', 'method', 'api', 'hidden'];

    protected $casts = [
        'hidden' => 'boolean',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission_relation', 'role_id', 'permission_id');
    }
}
