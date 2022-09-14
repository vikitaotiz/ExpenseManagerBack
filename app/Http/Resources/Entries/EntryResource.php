<?php

namespace App\Http\Resources\Entries;

use Illuminate\Http\Resources\Json\JsonResource;

class EntryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function percentageProfit($selling_price, $usage, $usage_cost)
    {
        $result = ((int)$usage_cost / ((int)$selling_price * (int)$usage) ) * 100;

        return number_format((float)$result, 2, '.', '');
    }

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            'product' => $this->product->name,
            'units' => $this->units,
            'parts' => $this->parts,
            'unit_price' => $this->unit_price,
            'selling_price' => $this->selling_price,
            'opening_stock' => $this->opening_stock,
            'closing_stock' => $this->closing_stock,
            'purchases' => $this->purchases,
            'purchases_cost' => $this->purchases_cost,
            'closing_stock_cost' => $this->closing_stock_cost,
            'usage' => $this->usage,
            'usage_cost' => $this->usage_cost,
            'system_usage' => $this->system_usage,
            'stock_shortage' => $this->stock_shortage,
            'stock_shortage_cost' => $this->stock_shortage_cost,
            'selling_price' => $this->selling_price,
            'usage_sales_cost' => (int)$this->selling_price * (int)$this->usage,
            'net_profit' => ((int)$this->selling_price * (int)$this->usage) - (int)$this->usage_cost,
            'percentage_profit' => $this->percentageProfit($this->selling_price, $this->usage, $this->usage_cost),
            'user' => $this->user->name,
            "company" => $this->company->name,
            "created_at" => $this->created_at->format('H:m A, jS D M Y')
        ];
    }
}
