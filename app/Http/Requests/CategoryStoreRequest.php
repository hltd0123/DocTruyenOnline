<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'categoryId' => ['required'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'create_at' => ['nullable'],
            'update_at' => ['nullable'],
            'status' => ['required', 'integer'],
        ];
    }
}
