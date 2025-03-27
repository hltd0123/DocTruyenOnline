<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'authorId' => $this->authorId,
            'name' => $this->name,
            'bio' => $this->bio,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'status' => $this->status,
            'stories' => $this->stories,
        ];
    }
}
