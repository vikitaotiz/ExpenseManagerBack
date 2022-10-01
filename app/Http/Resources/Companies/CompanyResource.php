<?php

namespace App\Http\Resources\Companies;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Entries\EntryResource;

class CompanyResource extends JsonResource
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
            "slug" => $this->slug,
            "users" => $this->users ? $this->users->count() : 0,
            "phone" => $this->phone,
            "email" => $this->email,
            "address" => $this->address,
            "city" => $this->city,
            "country" => $this->country,
            "entry_count" => $this->entries ? $this->entries->count() : 0,
            "store_count" => $this->stores ? $this->stores->count(): 0,
            "product_count" => $this->products ? $this->products->count() : 0,
            "entries" => $this->entries ? EntryResource::collection($this->entries) : null,
            "created_at" => $this->created_at->format('H:m A, jS D M Y')
        ];
    }
}
