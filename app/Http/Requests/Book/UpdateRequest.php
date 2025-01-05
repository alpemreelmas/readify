<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'author_id' => 'required|integer',
            'picture' => 'nullable|string',
            'summary' => 'nullable|string',
            'page_count' => 'required|integer',
            'original_language' => 'required|string|max:255',
            'genre_id' => 'required|integer',
            'published_by' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
        ];
    }
}
