<?php

namespace App\Http\Resources;

use App\Models\Menu;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $content = $this->content;
        return [
            'client' => $this->client,
            'paid' => $this->paid,
            'confirmed' => $this->confirmed,
            'sent' => $this->sent,
            'delivered' => $this->delivered,
            'content' => OrderContentResource::collection($content),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
