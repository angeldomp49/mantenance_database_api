<?php

namespace MakechTec\XochiDigital\Mantenance\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Column extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "name" => $this->name,
            "type" => $this->type,
            "size" => $this->size,
        ];
    }
}
