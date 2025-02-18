<?php

namespace App\Http\Resources\Credit;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuiviDossierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'observation'=>$this->observation,
            'statut'=>$this->statut,
            'user_id'=>$this->user_id,
            'dossier_id'=>$this->dossier_id
        ];
    }
}
