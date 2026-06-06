<x-app-layout>
    <x-nav-classroom :course="$course->id"/>
    <div class="max-w-5xl mx-auto mt-6">
        @if (auth()->user()->role === 'profesor')
            <x-create-menu :course="$course->id"/>
        @endif
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
                                @if (auth()->user()->role === "profesor")
                                    <x-menus.dropdown-actions
                                        :editRoute="route('courses.modules.edit', [$course, $module])"
                                        :deleteRoute="route('courses.modules.destroy', [$course, $module])"
                                        :title="'¿Deseas eliminar el módulo ' . $module->title . '?'"
                                    />
                                @endif
                            </div>
                        </div>

                        <!-- Contenido desplegable -->
                        <div x-show="open" x-transition class="border-t bg-slate-50">
                            @foreach ($module->items as $item)
                                <x-sections.content-list :item="$item" :type="$item->type" :course="$course"/>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>   
        @endif
    </div>
</x-app-layout>