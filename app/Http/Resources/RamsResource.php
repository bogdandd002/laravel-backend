<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RamsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ramsTitle' => $this -> ramsTitle,
            'ramsSubcon' => $this -> ramsSubcon,
            'revNumber' => $this -> revNumber,
            'revDate' => $this -> revDate,
            'ramsStatus' => $this -> ramsStatus,       
        ];
    }
}
