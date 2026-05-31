<!-- ARCHIVOS GUARDADOS -->
@if($submission->files->count())

    <div class="mt-4">

        <x-input-label value="Archivos actuales" />

        <div class="space-y-3 mt-2">

            @foreach($submission->files as $file)

                <div class="border rounded-lg p-3 flex justify-between items-center">

                    <div>

                        <a
                            href="{{ Storage::url($file->path) }}"
                            target="_blank"
                            class="underline text-blue-600"
                        >
                            {{ $file->original_name }}
                        </a>

                        <p class="text-sm text-gray-500">
                            {{ number_format($file->size / 1024,2) }} KB
                        </p>

                    </div>

                    <label class="flex items-center gap-2">

                        <input
                            type="checkbox"
                            name="delete_files[]"
                            value="{{ $file->id }}"
                            class="rounded border-gray-300"
                        >

                        <span class="text-red-600">
                            Eliminar
                        </span>

                    </label>

                </div>

            @endforeach

        </div>

    </div>

@endif


<!-- ARCHIVO NUEVO -->
<div class="mt-4">

    <x-input-label for="files" value="Agregar archivos" />

    <input
        type="file"
        name="files[]"
        id="files"
        multiple
        class="mt-1 block w-full"
    >

    <x-input-error :messages="$errors->get('files')" />

</div>


<!-- DESCRIPCIÓN -->
<div class="mt-4">

    <x-input-label
        for="comment"
        value="Comentario"
    />

    <x-textarea
        id="comment"
        name="comment"
        rows="4"
    >
        {{ old('comment', $submission->comment) }}
    </x-textarea>

    <x-input-error
        :messages="$errors->get('comment')"
    />

</div>