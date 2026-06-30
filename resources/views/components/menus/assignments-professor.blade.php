@props(['course', 'assignment'])
<div class="border-b border-gray-200 bg-white">
    <nav class="flex px-4 space-x-6">
        <!-- Opción activa -->
        <a href="{{ route('courses.assignments.show', [$course, $assignment])}}" class="py-4 text-sm font-medium border-b-2 {{ request()->routeIs('courses.show', $course) 
                ? 'border-blue-600 text-blue-600' 
                : 'border-transparent text-gray-500 hover:text-gray-700' }}">
            Instrucciones
        </a>

        <a href="{{ route('assignments.review',[$course, $assignment])}}" class="py-4 text-sm font-medium border-b-2 {{ request()->routeIs('courses.grades.index', $course) 
                ? 'border-blue-600 text-blue-600' 
                : 'border-transparent text-gray-500 hover:text-gray-700' }}">
            Trabajo en clase
        </a>

        <a href="{{ route('courses.grades.index', $course) }}" class="py-4 text-sm font-medium border-b-2 {{ request()->routeIs('courses.grades.index', $course) 
                ? 'border-blue-600 text-blue-600' 
                : 'border-transparent text-gray-500 hover:text-gray-700' }}">
            Calificaciones
        </a>
    </nav>
</div>

