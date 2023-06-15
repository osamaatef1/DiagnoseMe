<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResourse extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username'=>$this->username,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'role'=>$this->role,
        ];
    }
}
