<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignResource extends JsonResource
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
            'type' => $this->type,
            'name' => $this->name(),
            'main_img' => $this->main_img,
            'desc' => $this->desc(),
            'price' => $this->price,
            'discount' => $this->discount,
            'lang' => $this->lang(),
            'background' => $this->background,
            'font' => $this->font(),
            'color' => $this->color(),
            'details' => $this->details(),
            'rate' => $this->rate,

            'designimgs' => DesignimgResource::collection($this->whenLoaded('designimgs')),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
