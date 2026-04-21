<!-- TÍTULO -->
<div class="mt-2">
    <x-input-label for="title" value="Título" />
    <x-text-input id="title" name="title" type="text" class="block mt-1 w-full" required/>
</div>

<!-- DESCRIPCIÓN -->
<div class="mt-4">
    <x-input-label for="description" value="Descripción" />
    <textarea  id="description"  name="description" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-white" rows="4" require ></textarea>
</div>

<!-- archivo -->
<div class="mt-4">
    <x-input-label for="file" value="Archivo" />
    <input id="file" name="file" type="file" class="block mt-1 w-full text-sm text-gray-500">
</div>

<div class="mt-4">
    <x-input-label for="due_date" value="Fecha de entrega" />
    <input id="due_date" name="due_date" type="date" class="block mt-1 w-full text-sm text-gray-500">
</div>

<div class="mt-4">
    <x-input-label for="max_score" value="Calificación máxima" />
    <input id="max_score" name="max_score" type="number" class="block mt-1 w-full text-sm text-gray-500">
</div>

<!-- BOTÓN -->
<div class="mt-6 flex justify-end">
    <x-primary-button>
        Guardar tarea
    </x-primary-button>
</div>