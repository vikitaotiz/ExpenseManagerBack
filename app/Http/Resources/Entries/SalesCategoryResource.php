<?php

namespace App\Http\Resources\Entries;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Ingredient;
use App\Models\Product;

class SalesCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function productUnitPrice($id)
    {
        $product = Product::findOrFail($id);
        $ingredient = Ingredient::where("name", $product->name)->first();
        return $ingredient->buying_price;
    }

    
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            'product' => $this->product ? $this->product->name : "No product name",
            'category' => $this->product ? $this->product->category->title : "No category name",
            'unit_price' => $this->productUnitPrice($this->product_id),
            'selling_price' => $this->selling_price,
            "created_at" => $this->created_at->format('H:m A, jS D M Y')
        ];
    }
}