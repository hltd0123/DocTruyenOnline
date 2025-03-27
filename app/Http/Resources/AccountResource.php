<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'acId' => $this->acId,
            'userName' => $this->userName,
            'email' => $this->email,
            'role' => $this->role,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'status' => $this->status,
            'comments' => $this->comments,
            'favorites' => $this->favorites,
            'views' => $this->views,
        ];
    }
}
