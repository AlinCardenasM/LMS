@props(['course', 'module'])
<div x-data="{ open: false }" class="relative">
    <!-- Icono -->
    <button @click="open = !open" class=" text-gray-300 hover:text-gray-500">
        <ion-icon name="ellipsis-vertical-outline" ></ion-icon>
    </button>

    <!-- Menú desplegable -->
    <div 
        x-show="open" 
        @click.outside="open = false"
        class="absolute bottom-full mb-2 mt-2 w-40 bg-white border rounded shadow-lg"
    >
        <ul class="py-1 text-sm text-gray-700">
            <li><a href="{{ route('courses.modules.edit', [$course,$module]) }}" class="block px-4 py-2 hover:bg-blue-100">Editar</a></li>
            {{-- Alerta eliminar --}}
            <x-confirm-delete class="block px-4 py-2" :route="route('courses.modules.destroy', [$course,$module])" :title="'¿Deseas eliminar ' . $course->title . '?'" description="Esta acción no se puede deshacer." />
        </ul>
    </div>
</div>