<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
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
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username'=>$this->username,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'info' => $this->info,
            'address' => $this->address,
            'specialization'=>$this->specialization,
            'role'=>$this->role,
            'image'=>$this->image,
        ];
    }
}
