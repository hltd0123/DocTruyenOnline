<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'commentId' => $this->commentId,
            'content' => $this->content,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'status' => $this->status,
            'account_id' => $this->account_id,
            'story_id' => $this->story_id,
            'chapter_id' => $this->chapter_id,
        ];
    }
}
