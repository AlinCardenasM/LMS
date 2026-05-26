<!-- ARCHIVO -->
<div class="mt-4">
    <x-input-label for="file" value="Archivo" />
    <input type="file" name="files[]" multiple>
    <x-input-error :messages="$errors->get('file')" />
</div>

<!-- DESCRIPCIÓN -->
<div class="mt-4">
    <x-input-label for="comment" value="Comentario" />
    <x-textarea id="comment" name="comment" rows="4" >
        {{ old('comment', $assignment->comment) }}
    </x-textarea>
    <x-input-error :messages="$errors->get('comment')" />
</div>
