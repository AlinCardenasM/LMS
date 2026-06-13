@props(['course'])
<div class="border-b border-gray-200 bg-white">
    <nav class="max-w-6xl mx-auto flex space-x-8 px-4">

        <!-- TABLÓN -->
        <a href="{{ route('courses.show', $course) }}" class="py-4 text-sm font-medium border-b-2 {{ request()->routeIs('courses.show', $course) 
                ? 'border-blue-600 text-blue-600' 
                : 'text-gray-500 hover:text-gray-700' }}">
            Tablón
        </a>

        <a href="{{ route('courses.modules.index', $course) }}" class="py-4 text-sm font-medium border-b-2 {{ request()->routeIs('courses.modules.index', $course) 
                ? 'border-blue-600 text-blue-600' 
                : 'text-gray-500 hover:text-gray-700' }}">
            Trabajo en clase
        </a>

        <a href="{{ route('courses.users.index', $course) }}" class="py-4 text-sm font-medium border-b-2 {{ request()->routeIs('courses.users.index', $course) 
                ? 'border-blue-600 text-blue-600' 
                : 'border-transparent text-gray-500 hover:text-gray-700' }}">
            Personas
        </a>

       {{--  <!-- TRABAJO DE CLASE -->
        <a href="{{ route('courses.modules.index') }}" 
           class="py-4 text-sm font-medium border-b-2 
           {{ request()->routeIs('courses.modules.index') 
                ? 'border-blue-600 text-blue-600' 
                : 'border-transparent text-gray-500 hover:text-gray-700' }}">
            Trabajo de clase
        </a> --}}

       {{--  <!-- PERSONAS -->
        

        <!-- CALIFICACIONES -->
        <a href="{{ route('grades.index') }}" 
           class="py-4 text-sm font-medium border-b-2 
           {{ request()->routeIs('grades.*') 
                ? 'border-blue-600 text-blue-600' 
                : 'border-transparent text-gray-500 hover:text-gray-700' }}">
            Calificaciones
        </a> --}}

    </nav>
</div>