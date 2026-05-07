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

<!-- BOTÓN -->
<div class="mt-6 flex justify-end">
    <x-primary-button>
        Crear material
    </x-primary-button>
</div>