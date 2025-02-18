<?php

namespace App\Http\Resources\Credit;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DossierResource extends JsonResource
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
            'montant'=>$this->montant,
            'duree'=>$this->duree,
            'libelle'=>$this->libelle,
            'date_demande'=>$this->date_demande,
            'client_id'=>$this->client_id,
            'typeproduit_id'=>$this->typeproduit_id
            
        ];
    }
}
