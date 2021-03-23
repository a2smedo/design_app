<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'design_id' => $this->design_id,
            'design_type' => $this->design_type,
            'design_name' => $this->design_name,
           // 'lang' => $this->lang,
           // 'background' => $this->background,
            // 'color' => $this->color(),
            // 'font' => $this->font(),
           // 'details' => $this->details,
            'status' => $this->status,
            'created_at' => $this->created_at->format('Y-M-d h:i'),
        ];
    }
}
