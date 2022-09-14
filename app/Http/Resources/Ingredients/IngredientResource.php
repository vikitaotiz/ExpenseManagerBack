<?php

namespace App\Http\Resources\Ingredients;

use Illuminate\Http\Resources\Json\JsonResource;

class IngredientResource extends JsonResource
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
            "buying_price" => $this->buying_price,
            "quantity" => $this->quantity,
            "total_cost" => (float)$this->buying_price * (float)$this->quantity,
            "input_unit" => $this->input_unit,
            "processing_unit" => $this->processing_unit,
            "store" => $this->store ? $this->store->name : 'No store',
            "company" => $this->store ? $this->store->company->name : 'No company',
            "supplier" => $this->supplier? $this->supplier->name : "No supplier",
            "material_category" => $this->material_category ? $this->material_category->name : 'No material_category',
            "created_at" => $this->created_at->format('H:m A, jS D M Y')
        ];
    }
}
