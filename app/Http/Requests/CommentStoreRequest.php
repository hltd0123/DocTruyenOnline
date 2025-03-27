<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
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
            'commentId' => ['required'],
            'content' => ['required', 'string'],
            'create_at' => ['nullable'],
            'update_at' => ['nullable'],
            'status' => ['required', 'integer'],
            'account_id' => ['required', 'integer', 'exists:accounts,id'],
            'story_id' => ['nullable', 'integer', 'exists:stories,id'],
            'chapter_id' => ['nullable', 'integer', 'exists:chapters,id'],
        ];
    }
}
