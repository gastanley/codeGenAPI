<?php

namespace App\Http\Resources\credit;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonnelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'codePers'=>$this->codePers,
            'nomPers'=>$this->nomPers,
            'prenomPers'=>$this->prenomPers,
            'cinPers'=>$this->cinPers,
            'adressePers'=>$this->adressePers,
            'dateNaisPers'=>$this->dateNaisPers,
            'fonctionPers'=>$this->fonctionPers,
            'sitFamPers'=>$this->sitFamPers,
        ];
    }
}
