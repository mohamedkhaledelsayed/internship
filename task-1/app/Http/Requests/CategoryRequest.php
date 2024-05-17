<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'ar.name' => 'required|string|max:255',
            'en.name' => 'required|string|max:255',
            'description'=>'nullable'

        ];
    }
    public function messages(): array
    {
        return [
            'ar.name.required' => 'The name field is required.',
            'ar.name.string' => 'The name field must be a string.',
            'ar.name.max' => 'The name field must not exceed 255 characters.',
            'en.name.required' => 'The name field is required.',
            'en.name.string' => 'The name field must be a string.',
            'en.name.max' => 'The name field must not exceed 255 characters.',

        ];
    }

}

