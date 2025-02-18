<?php

namespace App\Http\Resources\Credit;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeproduitResource extends JsonResource
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
            'libelle'=>$this->libelle,
            'taux_mensuel'=>$this->taux_mensuel,
            'duree_mensuel'=>$this->duree_mensuel,
            'montant'=>$this->montant
        ];
    }
}
