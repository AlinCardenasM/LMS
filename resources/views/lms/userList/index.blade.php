<x-app-layout>
    <x-nav-classroom :course="$course->id"/>
    <div class="max-w-5xl mx-auto py-8">

        {{-- Profesores --}}
        <div class="mb-12">

            <div class="flex justify-between items-center border-b pb-4">
                <h2 class="text-4xl font-light">
                    Profesores
                </h2>

                <button
                    class="text-gray-600 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M18 9v6m3-3h-6M16 19a2 2 0 002-2V7a2 2 0 00-2-2H8a2 2 0 00-2 2v10a2 2 0 002 2h8z"/>
                    </svg>
                </button>
            </div>

            <div class="mt-6 flex items-center gap-4">
                <div
                    class="w-12 h-12 rounded-full bg-green-700 text-white flex items-center justify-center font-bold">
                    {{ strtoupper(substr($teacher->name,0,1)) }}
                </div>

                <span class="text-lg">
                    {{ $teacher->name }}
                </span>
            </div>
        </div>

        {{-- Alumnos --}}
        <div>
            <div class="flex justify-between items-center border-b pb-4">
                <h2 class="text-4xl font-light">
                    Alumnos
                </h2>

                <span class="text-sm text-gray-500">
                    {{ $students->count() }} inscritos
                </span>
            </div>

            @forelse($students as $student)

                <div
                    class="flex items-center gap-4 py-4 border-b border-gray-100">

                    <div
                        class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">
                        {{ strtoupper(substr($student->name,0,1)) }}
                    </div>

                    <div>
                        <p class="font-medium">
                            {{ $student->name }}
                        </p>

                        <p class="text-sm text-gray-500">
                            {{ $student->email }}
                        </p>
                    </div>

                    @if (auth()->user()->role === 'profesor')
                        <div class="ml-auto">
                            <div x-data="{ open: false }" class="relative">
                                <!-- Icono -->
                                <button @click="open = !open" class="text-gray-300 hover:text-gray-500">
                                    <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                </button>
                                <!-- Menú -->
                                <div
                                    x-show="open"
                                    x-transition
                                    @click.outside="open = false"
                                    class="absolute right-0 bottom-full mb-2 w-40 bg-white border rounded shadow-lg z-50"
                                >
                                    <ul class="py-1 text-sm text-gray-700">
                                        {{-- Eliminar --}}
                                        <li>
                                            <x-confirm-delete
                                                class="block w-full text-left px-4 py-2 hover:bg-blue-100"
                                                :route="route('courses.users.destroy', [$course, $student])"
                                                :title="'¿Deseas quitar del curso a ' . $student->name . '?'"
                                                description="Esta acción no se puede deshacer."
                                            />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
            @empty
                <div class="text-center py-16">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-32 h-32 mx-auto text-gray-300"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1"
                            d="M17 20h5V4H2v16h5m10 0v-4a4 4 0 00-8 0v4m8 0H9"/>
                    </svg>
                </div>
            @endforelse
        </div>

    </div>
</x-app-layout>