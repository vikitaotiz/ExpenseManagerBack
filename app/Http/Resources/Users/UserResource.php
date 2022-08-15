<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "phone" => $this->phone,
            "email" => $this->email,
            "country" => $this->country,
            "role" => $this->role->name,
            "company" => $this->company->name,
            "company_id" => $this->company_id,
            "created_at" => $this->created_at->format('H:m A, jS D M Y')
        ];
    }
}
