<div class="border-b border-gray-200 bg-white">
    <nav class="max-w-6xl mx-auto flex space-x-8 px-4">

        <!-- TABLÓN -->
        <a href="{{ route('course.index') }}" 
           class="py-4 text-sm font-medium border-b-2 
           {{ request()->routeIs('course.index') 
                ? 'border-blue-600 text-blue-600' 
                : 'text-gray-500 hover:text-gray-700' }}">
            Tablón
        </a>

        <!-- TRABAJO DE CLASE -->
        <a href="{{ route('module.index') }}" 
           class="py-4 text-sm font-medium border-b-2 
           {{ request()->routeIs('module.*') 
                ? 'border-blue-600 text-blue-600' 
                : 'border-transparent text-gray-500 hover:text-gray-700' }}">
            Trabajo de clase
        </a>

       {{--  <!-- PERSONAS -->
        <a href="{{ route('people.index') }}" 
           class="py-4 text-sm font-medium border-b-2 
           {{ request()->routeIs('people.*') 
                ? 'border-blue-600 text-blue-600' 
                : 'border-transparent text-gray-500 hover:text-gray-700' }}">
            Personas
        </a>

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