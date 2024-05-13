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
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',

        ];
    }
    public function messages(): array
    {
        return [
            'name_ar.required' => 'The name field is required.',
            'name_ar.string' => 'The name field must be a string.',
            'name_ar.max' => 'The name field must not exceed 255 characters.',
            'name_en.required' => 'The name field is required.',
            'name_en.string' => 'The name field must be a string.',
            'name_en.max' => 'The name field must not exceed 255 characters.',

        ];
    }

}

