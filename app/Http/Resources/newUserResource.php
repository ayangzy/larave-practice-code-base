<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class newUserResource extends JsonResource
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
            'email' => $this->email,
            'last_name' => $this->userDetails->last_name,
            'first_name' => $this->userDetails->first_name,
            'phone_number' => $this->userDetails->phone_number,
        ];
    }
}
