<!-- TÍTULO -->
<div class="mt-2">
    <x-input-label for="title" value="Título" />
    <x-text-input id="title" name="title" type="text" class="block mt-1 w-full" required />
</div>

<!-- DESCRIPCIÓN -->
<div class="mt-4">
    <x-input-label for="description" value="Descripción" />
    <x-textarea id="description" name="description" rows="4" required />
</div>

<!-- ARCHIVO -->
<div class="mt-4">
    <x-input-label for="file" value="Archivo" />
    <x-text-input id="file" name="file" type="file" class="block mt-1 w-full" />
</div>

<!-- FECHA -->
<div class="mt-4">
    <x-input-label for="due_date" value="Fecha de entrega" />
    <x-text-input id="due_date" name="due_date" type="date" class="block mt-1 w-full" />
</div>

<!-- CALIFICACIÓN -->
<div class="mt-4">
    <x-input-label for="max_score" value="Calificación máxima" />
    <x-text-input id="max_score" name="max_score" type="number" class="block mt-1 w-full" />
</div>

<!-- BOTÓN -->
<div class="mt-6 flex justify-end">
    <x-primary-button>Guardar tarea</x-primary-button>
</div>