<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->full_name,
            'avatar' => $this->avatar,
            'gender' => $this->gender,
            'phone_number' => $this->phone_number,
            'house_phone_number' => $this->house_phone_number,
            'email' => $this->email,
            'address' => $this->address,
            'birthday' => $this->birthday,
            'memo' => $this->memo,
            'path' => $this->path,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}