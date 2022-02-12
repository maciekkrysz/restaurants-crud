<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'postal_code' => $this->postal_code,
            'city' => $this->city,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'menu' => MenuResource::collection($this->menus),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
