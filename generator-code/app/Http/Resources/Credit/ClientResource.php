<?php

namespace App\Http\Resources\Credit;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'nom_clt'=>$this->nom_clt,
            'prenom_clt'=>$this->prenom_clt,
            'cin'=>$this->cin,
            'adresse'=>$this->adresse,
            'folio'=>$this->folio,
        ];
    }
}
