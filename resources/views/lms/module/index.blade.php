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
                    <div x-data="{ open: false }" class="bg-white rounded-xl shadow">

                        <!-- Header módulo -->
                        <div class="p-4 flex items-center justify-between">
                            {{-- Título --}}
                            <p class="font-medium text-gray-700">
                                {{ $module->title }}
                            </p>

                            {{-- Acciones --}}
                            <div class="flex items-center gap-2">
                                <!-- Botón desplegable -->
                                <button @click="open = !open" class="text-gray-300 hover:text-gray-500">
                                    <ion-icon x-bind:name="open ? 'chevron-up-outline' : 'chevron-down-outline'"></ion-icon>
                                </button>
                                {{-- Menú configuración --}}
                                <x-menus.dropdown-actions :course="$course" :module="$module"/>
                            </div>
                        </div>

                        <!-- Contenido desplegable -->
                        <div x-show="open" x-transition class="border-t bg-slate-50">
                            @foreach ($module->contents as $content)
                                <x-sections.content-list :content="$content"/>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>   
        @endif
    </div>
</x-app-layout>