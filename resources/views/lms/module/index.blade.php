<x-app-layout>
    <x-nav-classroom :course="$course->id"/>
    <div class="max-w-5xl mx-auto mt-6">
        <x-create-menu :course="$course->id"/>
        {{-- Validacion si valiable modulo esta vacia colocar Componente --}}
        @if ($modules->isEmpty())
            <x-empy-state/>
        @else
        {{-- Si hay modulos entonces enlistalos --}}
            <div class="space-y-4">
                @foreach ($modules as $module )
                    <div class="bg-white rounded-xl shadow p-4 flex items-center justify-between">
                    <!-- Título a la izquierda -->
                    <span class="font-medium text-gray-700">
                        {{ $module->title }}
                    </span>

                    <!-- Botones juntos a la derecha -->
                    <div class="flex space-x-2">
                        <a href="{{ route('courses.modules.edit', [$course,$module]) }}" class="text-blue-600 hover:underline">Editar</a>
                        <form action="{{ route('courses.modules.destroy', [$course,$module]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Borrar</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>   
        @endif
    </div>
</x-app-layout>