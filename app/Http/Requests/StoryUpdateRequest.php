<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoryUpdateRequest extends FormRequest
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
            'storyId' => ['required'],
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'coverImage' => ['nullable', 'string'],
            'create_at' => ['nullable'],
            'update_at' => ['nullable'],
            'status' => ['required'],
            'author_id' => ['required', 'integer', 'exists:authors,id'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ];
    }
}
