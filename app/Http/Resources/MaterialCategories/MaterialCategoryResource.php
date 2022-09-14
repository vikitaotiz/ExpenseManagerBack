<?php

namespace App\Http\Resources\MaterialCategories;

use Illuminate\Http\Resources\Json\JsonResource;

class MaterialCategoryResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "company" => $this->company ? $this->company->name : "No company",
            "created_at" => $this->created_at->format('H:m A, jS D M Y')
        ];
    }
}
