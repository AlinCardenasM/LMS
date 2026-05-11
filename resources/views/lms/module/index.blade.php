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
                <x-alert-success />
                @foreach ($modules as $module )
                    <div class="bg-white rounded-xl shadow p-4 flex items-center justify-between">
                        <p class="font-medium text-gray-700"> {{ $module->title }}</p>
                        {{-- Menú configuracion de modulos --}}
                        <x-menus.module-options :course="$course" :module="$module"/>
                    </div>
                @endforeach
            </div>   
        @endif
    </div>
</x-app-layout>