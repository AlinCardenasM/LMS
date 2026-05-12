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
                        <x-menus.dropdown-actions :course="$course" :module="$module"/>
                    </div>
                    {{-- Contenidos --}}
                    <div>
                        @foreach ($module->contents as $content)
                            <div class="flex items-center justify-between p-4 border-b">

                            <div class="flex items-center gap-3">

                                <div class="bg-gray-100 p-3 rounded-full">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>

                                <div>
                                    <p class="font-medium">
                                        {{ $content->title }}
                                    </p>

                                    <p class="text-sm text-gray-500">
                                        Publicado:
                                        {{ $content->created_at->format('d M') }}
                                    </p>
                                </div>

                            </div>

                        </div>
                            
                        @endforeach
                    </div>
                @endforeach
            </div>   
        @endif
    </div>
</x-app-layout>