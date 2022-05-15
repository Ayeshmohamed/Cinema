<?php

namespace Modules\Halls\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class HallResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name'=> $this->name,
            'number_of_seets' => $this->number_of_seets,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'bookings' => $this->bookings,
            
        ];
    }
}
