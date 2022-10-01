<?php

namespace App\Http\Resources\Products;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "selling_price" => $this->selling_price,
            "description" => $this->description,
            "category" => $this->category ? $this->category->title : 'No category',
            "raw_materials" => $this->ingredients,
            "company" => $this->company->name,
            "created_at" => $this->created_at->format('H:m A, jS D M Y')
        ];
    }
}
