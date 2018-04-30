<?php

namespace App\Http\Resources\Students;

use Illuminate\Http\Resources\Json\Resource;

class Students extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->student->name
        ];
    }
}
