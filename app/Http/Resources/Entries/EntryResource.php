<?php

namespace App\Http\Resources\Entries;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Ingredient;
use App\Models\Product;

class EntryResource extends JsonResource
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
            // 'product1' => $this->product,
            'category' => $this->product ? $this->product->category->title : "No category name",
            // 'units' => $this->units,
            'parts' => $this->parts,
            'unit_price' => $this->productUnitPrice($this->product_id),
            'selling_price' => $this->selling_price,
            'opening_stock' => $this->opening_stock,
            'closing_stock' => $this->closing_stock,
            'purchases' => $this->purchases,
            'purchases_cost' => $this->purchases_cost,
            'closing_stock_cost' => $this->closing_stock_cost,
            'usage' => $this->usage,
            'usage_cost' => $this->selling_price * $this->usage,
            'system_usage' => $this->system_usage,
            'stock_shortage' => $this->stock_shortage,
            'stock_shortage_cost' => $this->stock_shortage_cost,
            'selling_price' => $this->selling_price,
            'usage_sales_cost' => (int)$this->selling_price * (int)$this->usage,
            'net_profit' => ((int)$this->selling_price * (int)$this->usage) - (int)$this->usage_cost,
            // 'percentage_profit' => $this->percentageProfit($this->selling_price, $this->usage, $this->usage_cost),
            'percentage_profit' => 0,
            'user' => $this->user ? $this->user->name : "No user",
            "company" => $this->company ? $this->company->name : "No company",
            "created_at" => $this->created_at->format('H:m A, jS D M Y')
        ];
    }
}
