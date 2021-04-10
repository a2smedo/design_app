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

            'competitionDesigns' => CompetitionDesignsResource::collection($this->whenLoaded('competitionDesigns')),
            'started_at' => $this->started_at,
            'expired_at' => $this->expired_at,
        ];
    }
}
