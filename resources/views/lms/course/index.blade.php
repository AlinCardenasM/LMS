<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Cursos') }}
            </h2>
            <x-dropdown-link href="{{ route('course.create') }}" class="max-w-max text-blue-600">
                {{('Crear') }}
            </x-dropdown-link>

        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($courses as $course)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <x-card 
                        image="https://picsum.photos/400/300" 
                        :title="$course->title" 
                        :description="$course->description"
                    > 
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('course.show', $course) }}" class="text-blue-500">Ver</a>
                            <a href="{{ route('course.edit', $course) }}" class="text-yellow-600">Editar</a>
                            <form action="{{ route('course.destroy', $course) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Borrar</button>
                            </form>
                        </div>
                    </x-card> 
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
