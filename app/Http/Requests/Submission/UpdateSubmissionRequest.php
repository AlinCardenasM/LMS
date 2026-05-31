<?php

namespace App\Http\Requests\Submission;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSubmissionRequest extends FormRequest
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
        /* dd('aqui estoy'); */
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

            $submission = $this->route('submission');

            $hasComment = filled($this->comment);

            $hasNewFiles = $this->hasFile('files');

            /*
            archivos actualmente guardados
            */

            $existingFilesCount =
                $submission->files()->count();

            /*
            archivos marcados para eliminar
            */

            $deletedFilesCount =
                count($this->delete_files ?? []);

            /*
            archivos que quedarán después del update
            */

            $remainingFiles =
                $existingFilesCount - $deletedFilesCount;

            $hasRemainingFiles =
                $remainingFiles > 0;

            if (
                ! $hasComment
                && ! $hasNewFiles
                && ! $hasRemainingFiles
            ) {

                $validator->errors()->add(
                    'submission',
                    'Debes agregar un comentario o mantener/subir al menos un archivo.'
                );
            }
        });
    }
}
