<?php

namespace App\Http\Resources\credit;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PretResource extends JsonResource
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
            'date_pret'=>$this->date_pret,
            'libelle_pret'=>$this->libelle_pret,
            'dossier_id'=>$this->dossier_id
        ];
    }
}
