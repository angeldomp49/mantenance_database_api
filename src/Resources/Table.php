<?php

namespace MakechTec\XochiDigital\Mantenance\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Table extends JsonResource{

    public function toArray($request){

        return [
            "id" => $this->id,
            "name" => $this->name,
            "columns" => Column::collection($this->columns)
        ];
    }
}
