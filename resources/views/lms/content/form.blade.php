<!-- TÍTULO -->
<div class="mt-2">
    <x-input-label for="title" value="Título" />
    <x-text-input id="title" name="title" type="text" class="block mt-1 w-full" required/>
</div>

<!-- DESCRIPCIÓN -->
<div class="mt-4">
    <x-input-label for="description" value="Descripción" />
    <x-textarea id="description" name="description" rows="4" required />
</div>

<!-- IMAGEN -->
<div class="mt-4">
    <x-input-label for="file" value="Archivo" />
    <x-text-input id="file" name="file" type="file" class="block mt-1 w-full" />
</div>

<div class="mt-4">
    <x-input-label for="module_id" value="Módulo" />

    <select name="module_id" id="module_id" class="block mt-1 w-full border-gray-300 rounded-md dark:bg-gray-700 dark:text-white">
        @foreach ($module as $id => $title)
            <option value="{{ $id }}" {{ old('module_id', $content->module_id ?? '') == $id ? 'selected' : '' }}> {{ $title }} </option>
        @endforeach
    </select>
</div>

<!-- BOTÓN -->
<div class="mt-6 flex justify-end">
    <x-primary-button>
        Crear material
    </x-primary-button>
</div>