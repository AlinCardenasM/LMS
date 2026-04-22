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

<!-- CÓDIGO DE ACCESO -->
<div class="mt-4">
    <x-input-label for="access_code" value="Código de acceso" />
    <x-text-input id="access_code" name="access_code" type="text" class="block mt-1 w-full" />
</div>

<!-- STATUS -->
<div class="mt-4">
    <x-input-label for="status" value="Estado" />
    <select 
        id="status" 
        name="status" 
        class="block mt-1 w-full border-gray-300 rounded-md dark:bg-gray-700 dark:text-white"
    >
        <option value="activo">Activo</option>
        <option value="inactivo">Inactivo</option>
    </select>
</div>

<!-- BOTÓN -->
<div class="mt-6 flex justify-end">
    <x-primary-button>
        Guardar curso
    </x-primary-button>
</div>