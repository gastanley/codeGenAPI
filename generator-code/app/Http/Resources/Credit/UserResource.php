<?php

namespace App\Http\Resources\credit;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'username'=>$this->username,
            'email'=>$this->email,
            'caisse'=>$this->caisse,
            'fonction'=>$this->fonction,
            'password'=>$this->password
        ];
    }
}
