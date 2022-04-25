<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AgenciesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return [
        //     "id" => $this->id,
        //     "nombre" => $this->nom,
        //     "calle" => $this->carrer,
        //     "Municipio" => $this->municipis_id,
        //     // "Municipio" => MunicipisResource::collection($this->municipis_id),
        //     "Codigo Postal" => $this->codi_postal
        // ];
        return parent::toArray($request);
    }
}
