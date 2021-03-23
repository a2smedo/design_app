<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'name' => $this->name(),
            'price' => $this->price,
            'desc' => $this->desc(),
            'created_at' => $this->created_at->format('Y-M-d h:i:s A'),
        ];
    }
}
