<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompetitionResource extends JsonResource
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
            'desc' => $this->desc(),
            'competition_designs' => CompetitionDesignsResource::collection($this->whenLoaded('competition_designs')),
            'expired_at' => $this->expired_at,
        ];
    }
}
