<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'storyId' => $this->storyId,
            'title' => $this->title,
            'description' => $this->description,
            'coverImage' => $this->coverImage,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'status' => $this->status,
            'author_id' => $this->author_id,
            'category_id' => $this->category_id,
        ];
    }
}
