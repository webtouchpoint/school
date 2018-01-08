<?php

namespace App\Http\Resources\Settings;

use Illuminate\Http\Resources\Json\Resource;

class FeesStructureResource extends Resource
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
            'name' => $this->name,
            'class_name' => optional($this->schoolClass)->name,
            'fees_category' => optional($this->feesCategory)->name,
            'amont' => $this->amount,
            'description' => $this->description
        ];
    }
}
