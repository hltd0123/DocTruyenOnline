<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViewUpdateRequest extends FormRequest
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
            'viewId' => ['required'],
            'viewed_at' => ['required'],
            'create_at' => ['nullable'],
            'update_at' => ['nullable'],
            'status' => ['required', 'integer'],
            'account_id' => ['required', 'integer', 'exists:accounts,id'],
            'story_id' => ['required', 'integer', 'exists:stories,id'],
            'chapter_id' => ['nullable', 'integer', 'exists:chapters,id'],
        ];
    }
}
