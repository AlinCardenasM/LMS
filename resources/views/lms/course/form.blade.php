<!-- TÍTULO -->
<div class="mt-2">
    <x-input-label for="title" value="Título del curso" />
    <x-text-input id="title" name="title" type="text" class="block mt-1 w-full" value="{{ old('title', $course ->title) }}" required/>
</div>

<!-- DESCRIPCIÓN -->
<div class="mt-4">
    <x-input-label for="description" value="Descripción" />
    <x-textarea id="description" name="description" rows="4" required>
        {{ old('description', $course->description) }}
    </x-textarea>
</div>

<!-- IMAGEN -->
<div class="mt-4">
    <x-input-label for="image" value="Imagen del curso" />
    <x-text-input id="image" name="image" type="file" class="block mt-1 w-full" />
</div>

<!-- STATUS -->
<div class="mt-4">
    <x-input-label for="status" value="Estado" />
    <select name="course_status_id" id="course_status_id" class="block mt-1 w-full border-gray-300 rounded-md dark:bg-gray-700 dark:text-white">
        @foreach ($status as $name => $id)
            <option value="{{ $id }}"
                {{ old('course_status_id', $course->status_id ?? '') == $id ? 'selected' : '' }}>
                {{ $name }}
            </option>
        @endforeach
    </select>
</div>

<!-- BOTÓN -->
<div class="mt-6 flex justify-end">
    <x-primary-button> Enviar </x-primary-button>
</div>