<!-- TÍTULO -->
<div class="mt-2">
    <x-input-label for="title" value="Título" />
    <x-text-input id="title" name="title" type="text" class="block mt-1 w-full" required />
    <x-input-error :messages="$errors->get('title')" />
</div>

<!-- DESCRIPCIÓN -->
<div class="mt-4">
    <x-input-label for="description" value="Descripción" />
    <x-textarea id="description" name="description" rows="4" required />
    <x-input-error :messages="$errors->get('description')" />
</div>

<!-- ARCHIVO -->
<div class="mt-4">
    <x-input-label for="file" value="Archivo" />
    <input type="file" name="files[]" multiple>
    <x-input-error :messages="$errors->get('file')" />
</div>

<!-- FECHA -->
<div class="mt-4">
    <x-input-label for="due_date" value="Fecha de entrega" />
    <x-text-input id="due_date" name="due_date" type="date" class="block mt-1 w-full" />
    <x-input-error :messages="$errors->get('due_date')" />
</div>

<!-- CALIFICACIÓN -->
<div class="mt-4">
    <x-input-label for="max_score" value="Calificación máxima" />
    <x-text-input id="max_score" name="max_score" type="number" class="block mt-1 w-full" />
    <x-input-error :messages="$errors->get('max_score')" />
</div>

{{-- Modulo --}}
<div class="mt-4">
    <x-input-label for="module_id" value="Selecciona a que sección pertenece" />
    <select name="module_id" id="module_id" class="block mt-1 w-full border-gray-300 rounded-md dark:bg-gray-700 dark:text-white">
        @foreach ($module as $title => $id)
            <option value="{{ $id }}" {{ old('module_id', $assignment->module_id ?? '') == $id ? 'selected' : '' }}> {{ $title }}
            </option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('module_id')" />
</div>

