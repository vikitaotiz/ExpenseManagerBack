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
            "users" => $this->users->count(),
            "phone" => $this->phone,
            "email" => $this->email,
            "address" => $this->address,
            "city" => $this->city,
            "country" => $this->country,
            "entry_count" => $this->entries->count(),
            "entries" => EntryResource::collection($this->entries),
            "created_at" => $this->created_at->format('H:m A, jS D M Y')
        ];
    }
}
