<?php

namespace Chenggx\EasyPermission\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class Permission extends JsonResource
{
    public function toArray($request)
    {
        $path = str_replace('_', '/', Str::snake($this->name));

        return [
            'id' => $this->id,
            'pid' => $this->pid,
            'path' => 0 === $this->pid ? "/$path" : $path,
            'redirect' => '',
            'name' => $this->name,
            'hidden' => $this->hidden,
            'meta' => [
                'id' => $this->id,
                'order' => $this->order,
                'type' => $this->type,
                'title' => $this->title,
                'icon' => $this->icon,
                'method' => $this->method,
                'api' => $this->api,
            ],
        ];
    }
}
