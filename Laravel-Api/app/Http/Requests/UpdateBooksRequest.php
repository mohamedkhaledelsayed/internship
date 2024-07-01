<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBooksRequest extends FormRequest
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
        $bookId = $this->route('book')->id ?? $this->route('book');
        return [
            'name' => [
                'required',
                Rule::unique('books')->ignore($bookId)->where(function ($query) {
                    return $query->where('author_id', $this->author_id);
                }),
            ],
            'description' => 'required',
            'publication_year' => 'required|integer',
            'author_id' => 'required',
        ];
    }

}


