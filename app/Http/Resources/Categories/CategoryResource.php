<?php

namespace App\Http\Resources\Categories;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Products\ProductResource;

class CategoryResource extends JsonResource
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
            "title" => $this->title,
            "slug" => $this->slug,
            "description" => $this->description,
            "products" => $this->products->count(),
            "products_data" => ProductResource::collection($this->products),
            "created_at" => $this->created_at->format('H:m A, jS D M Y')
        ];
    }
}
