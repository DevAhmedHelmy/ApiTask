<?php

namespace App\Http\Resources;

use App\Http\Resources\ActionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'type' => $this->type,
            'user' => $this->user->name,
            'actions' => ActionResource::collection($this->actions),
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
