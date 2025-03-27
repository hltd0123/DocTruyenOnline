<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChapterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'chapterId' => $this->chapterId,
            'chapterTitle' => $this->chapterTitle,
            'content' => $this->content,
            'chapterNumber' => $this->chapterNumber,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'status' => $this->status,
            'story_id' => $this->story_id,
        ];
    }
}
