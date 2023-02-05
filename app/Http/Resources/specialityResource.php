<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class specialityResource extends JsonResource
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
            'speciality_id'=>$this->id,
            'speciality_name'=>$this->name,
        ];
    }
}
