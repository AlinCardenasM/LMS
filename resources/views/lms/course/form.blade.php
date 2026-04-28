<!-- TÍTULO -->
<div class="mt-2">
    <x-input-label for="title" value="Título del curso" />
    <x-text-input id="title" name="title" type="text" class="block mt-1 w-full" required/>
</div>

<!-- DESCRIPCIÓN -->
<div class="mt-4">
    <x-input-label for="description" value="Descripción" />
    <x-textarea id="description" name="description" rows="4" required />
</div>

<!-- IMAGEN -->
<div class="mt-4">
    <x-input-label for="image" value="Imagen del curso" />
    <x-text-input id="file" name="file" type="file" class="block mt-1 w-full" />
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
    <button 
    type="submit"
    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg shadow-md transition duration-200"
>
    Guardar curso
</button>
</div>