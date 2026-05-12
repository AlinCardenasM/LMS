<?php

namespace App\Http\Requests\Content;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContentStoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:50',
            'description' => 'max:500',
            'file' => ['nullable', 'array', 'mimes:pdf,doc,docx,png,jpg,jpeg,xlsx,zip'],
            'module_id' => 'required',
        ];
    }
}
