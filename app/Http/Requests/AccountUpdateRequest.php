<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountUpdateRequest extends FormRequest
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
            'acId' => ['required'],
            'userName' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'password'],
            'role' => ['required', 'integer'],
            'create_at' => ['nullable'],
            'update_at' => ['nullable'],
            'status' => ['required', 'integer'],
            'comments' => ['required', 'string'],
            'favorites' => ['required', 'string'],
            'views' => ['required', 'string'],
        ];
    }
}
