@props(['course'])
<div class="border-b border-gray-200 bg-white">
    <nav class="max-w-6xl mx-auto flex space-x-8 px-4">
        <a href="{{ route('courses.show', $course)}}" class="py-4 text-sm font-medium border-b-2 {{ request()->routeIs('courses.show', $course) 
                ? 'border-blue-600 text-blue-600' 
                : 'border-transparent text-gray-500 hover:text-gray-700' }}">
            Tablón
        </a>

        <a href="{{ route('courses.modules.index', $course)}}" class="py-4 text-sm font-medium border-b-2 {{ request()->routeIs('courses.modules.index', $course) 
                ? 'border-blue-600 text-blue-600' 
                : 'border-transparent text-gray-500 hover:text-gray-700' }}">
            Trabajo en clase
        </a>

        <a href="{{ route('courses.users.index', $course) }}" class="py-4 text-sm font-medium border-b-2 {{ request()->routeIs('courses.users.index', $course) 
                ? 'border-blue-600 text-blue-600' 
                : 'border-transparent text-gray-500 hover:text-gray-700' }}">
            Personas
        </a>

        <a href="{{ route('courses.grades.index', $course) }}" class="py-4 text-sm font-medium border-b-2 {{ request()->routeIs('courses.grades.index', $course) 
                ? 'border-blue-600 text-blue-600' 
                : 'border-transparent text-gray-500 hover:text-gray-700' }}">
            Calificaciones
        </a>
    </nav>
</div>