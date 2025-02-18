<?php

namespace App\Http\Resources\credit;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReceptionDossierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nameClt'=>$this->nameClt,
            'folioClient'=>$this->folioClient,
            'typeProd'=>$this->typeProd,
            'typeDossier'=>$this->typeDossier,
            'montantPret'=>$this->montantPret,
            'dureePret'=>$this->dureePret,
            'libellePret'=>$this->libellePret,
            'datePret'=>$this->datePret,
            'statusCredit'=>$this->statusCredit,
        ];
    }
}
