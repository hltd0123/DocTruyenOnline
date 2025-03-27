<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorUpdateRequest extends FormRequest
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
            'authorId' => ['required'],
            'name' => ['required', 'string'],
            'bio' => ['nullable', 'string'],
            'create_at' => ['nullable'],
            'update_at' => ['nullable'],
            'status' => ['required', 'integer'],
            'stories' => ['required', 'string'],
        ];
    }
}
