<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DealResouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'customer_id'   => $this->customer_id,
            'title'         => $this->title,
            'type'          => $this->type,
            'is_active'     => $this->is_active,
            'active_from'   => $this->active_from,
            'active_to'     => $this->active_to
            //'customer'      => CustomerResource::collection($this->customer_id)
        ];
    }
}
