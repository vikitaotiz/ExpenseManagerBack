<?php

namespace App\Http\Resources\Accounts;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
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
            "supplier" => $this->supllier? $this->supllier->name : "No supplier",
            "initial_amount" => $this->initial_amount,
            "amount_settled" => $this->amount_settled,
            "balance" => $this->balance,
            "created_at" => $this->created_at->format('H:m A, jS D M Y')
        ];
    }
}
