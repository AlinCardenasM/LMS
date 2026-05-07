@props(['course'])
<!-- BOTÓN CREAR -->
<div x-data="{ open: false }" class="relative inline-block">
    <!-- BOTÓN -->
    <button
        @click="open = !open"
        class="flex items-center gap-2 bg-blue-600 text-white px-5 py-2 rounded-full shadow hover:bg-blue-700 transition">
        <span class="text-lg">+</span>
        Crear
    </button>

    <!-- MENÚ -->
    <div 
        x-show="open"
        @click.outside="open = false"
        x-transition
        class="absolute mt-2 w-48 bg-white rounded-xl shadow-lg z-50">

        <a href="{{ route('assigment.create') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">
            Tarea
        </a>

        <a href="{{ route('content.index') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">
            Material
        </a>

        <a href="{{ route('courses.modules.create', $course) }}" class="block px-4 py-2 text-sm hover:bg-gray-100">
            Tema
        </a>
    </div>
</div>
<!-- LÍNEA -->
<div class="border-t border-gray-300 mb-10 mt-3"></div>