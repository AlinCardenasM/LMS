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

<!-- IMAGEN -->
<div class="mt-4">
    <x-input-label for="file" value="Archivo" />
    <input id="file" name="file" type="file" class="block mt-1 w-full text-sm text-gray-500">
</div>

<!-- BOTÓN -->
<div class="mt-6 flex justify-end">
    <x-primary-button>
        Crear material
    </x-primary-button>
</div>