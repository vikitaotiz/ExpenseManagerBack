<?php

namespace App\Http\Resources\Purchases;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
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
            "product" => $this->product,
            "quantity" => $this->quantity,
            "issued" => $this->issued,
            "opening_stock" => $this->opening_stock,
            "closing_stock" => $this->closing_stock,
            "measurement" => $this->measurement,
            "total_amount" => $this->total_amount,
            "unit_price" => $this->unit_price,
            "balance" => $this->balance,
            "user" => $this->user? $this->user->name: "No user",
            "company" => $this->company? $this->company->name: "No company",
            "payment_mode" => $this->payment_mode? $this->payment_mode->name: "No payment_mode",
            "created_at" => $this->created_at->format('H:m A, jS D M Y')
        ];
    }
}
