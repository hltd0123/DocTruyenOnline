<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChapterUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'chapterId' => ['required'],
            'chapterTitle' => ['required', 'string'],
            'content' => ['required', 'string'],
            'chapterNumber' => ['required', 'integer'],
            'create_at' => ['nullable'],
            'update_at' => ['nullable'],
            'status' => ['required', 'integer'],
            'story_id' => ['required', 'integer', 'exists:stories,id'],
        ];
    }
}
