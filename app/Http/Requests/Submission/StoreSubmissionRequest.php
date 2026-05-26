<?php

namespace App\Http\Requests\Submission;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSubmissionRequest extends FormRequest
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
            'comment' => 'nullable|string|max:1000',
            'status' => 'max:500',
            'files' => 'nullable|array',
            'files.*' => 'file|max:10240',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $hasComment = filled($this->comment);

            $hasFiles = $this->hasFile('files');

            if (! $hasComment && ! $hasFiles) {

                $validator->errors()->add(
                    'submission',
                    'Debes agregar un comentario o subir al menos un archivo.'
                );
            }
        });
    }
}
