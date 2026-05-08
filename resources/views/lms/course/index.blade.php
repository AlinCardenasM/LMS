<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Cursos') }}
            </h2>
            <a href="{{ route('courses.create') }}" class="text-blue-500">Crear</a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-alert-success />
        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($courses as $course)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <x-card image="{{ $course->image }}" :title="$course->title" :description="$course->description" :access_code="$course->access_code"> 
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('courses.show', $course) }}" class="text-blue-500">Ver</a>
                            <a href="{{ route('courses.edit', $course) }}" class="text-yellow-600">Editar</a>
                            <x-confirm-delete :route="route('courses.destroy', $course)" :title="'¿Deseas eliminar ' . $course->title . '?'" description="Esta acción no se puede deshacer."/>
                        </div>
                    </x-card> 
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
