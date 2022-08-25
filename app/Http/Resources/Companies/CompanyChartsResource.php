<?php

namespace App\Http\Resources\Companies;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Entries\EntryResource;
use Carbon\Carbon;

class CompanyChartsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function usageSalesCost($entries)
    {
        $sum = 0;
        foreach ($entries as $entry) {
           $totalSales = (int)$entry->selling_price * (int)$entry->usage;
           $sum = $sum + $totalSales;
        }
       
        return $sum;
    }

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            // "entry_count1" => $this->entries->sum('usage'),
            // "entry_count" => $this->entries->count(),
            // "store_count" => $this->stores->count(),
            // "product_count" => $this->products->count(),
            "total_sales" => $this->usageSalesCost($this->entries),
        ];
    }
}
