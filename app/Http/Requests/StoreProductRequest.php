<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'value' => [
                'required',
                'decimal:2',
            ],
            'amount' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'nullable',
                'integer',
            ],
            'updated_by' => [
                'nullable',
                'integer',
            ]
        ];
    }
}
