<?php

namespace Chenggx\EasyPermission\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'remark'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission_relation', 'role_id', 'permission_id');
    }
}