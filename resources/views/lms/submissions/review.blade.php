<x-app-layout>
    <div class="bg-white min-h-screen">
        {{-- Encabezado --}}
        <x-menus.assignments-professor :course='$course' :assignment='$assignment' />

        {{-- Contenido principal --}}
        <div class="grid grid-cols-12 min-h-[calc(100vh-65px)]">

            {{-- Panel izquierdo --}}
            <div class="col-span-4 border-r">

                {{-- Barra superior --}}
                <div class="p-6 border-b">
                    <div class="flex items-center gap-3">
                        {{--  <input type="checkbox" class="rounded border-gray-300"> --}}
                        <ion-icon
                            name="people-outline"
                            class="text-2xl text-gray-600">
                        </ion-icon>
                        <span class="font-medium">
                            Todos los alumnos
                        </span>
                    </div>
                </div>

                {{-- Filtro --}}
                {{-- <div class="p-6 border-b">
                    <select
                        class="w-full border rounded-md px-4 py-3 bg-gray-100">
                        <option>
                            Ordenar por estado
                        </option>
                    </select>
                </div> --}}

                {{-- Entregados --}}
                <div class="border-b">
                    <div class="px-6 py-4 font-semibold text-gray-700">
                        Entregado
                    </div>

                    @foreach($submitted as $submission)

                        <div class="flex items-center justify-between border-t">

                            <div class="flex items-center gap-4 p-4">

                                <div
                                    class="w-12 h-12 rounded-full bg-green-700 text-white flex items-center justify-center">

                                    {{ strtoupper(substr($submission->user->name,0,1)) }}

                                </div>

                                <span>
                                    {{ $submission->user->name }}
                                </span>

                            </div>

                            <div class="pr-6 text-green-700 font-medium">
                                {{ $submission->grade?->score ?? '_' }}/{{ $assignment->max_score }}
                            </div>

                        </div>

                    @endforeach

                </div>

                {{-- Pendientes --}}
                <div>

                    <div class="px-6 py-4 font-semibold text-gray-700">
                        Asignado
                    </div>

                    @foreach($assigned as $student)

                        <div class="flex items-center border-t p-4 gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-blue-600 text-white flex items-center justify-center">

                                {{ strtoupper(substr($student->name,0,1)) }}

                            </div>

                            <span>
                                {{ $student->name }}
                            </span>
                        </div>

                    @endforeach

                </div>

            </div>

            {{-- Panel derecho --}}
            <div class="col-span-8 p-8">

                {{-- Título --}}
                <h1 class="text-4xl font-light mb-8">
                    {{ $assignment->title }}
                </h1>

                {{-- Estadísticas --}}
                <div class="flex gap-12 mb-8">

                    <div>
                        <p class="text-4xl font-light">
                            {{ $submitted->count() }}
                        </p>

                        <p class="text-gray-600">
                            Entregada
                        </p>
                    </div>

                    <div>
                        <p class="text-4xl font-light">
                            {{ $assigned->count() }}
                        </p>

                        <p class="text-gray-600">
                            Asignada
                        </p>
                    </div>

                </div>

                {{-- Switch --}}
                {{-- <div class="flex items-center gap-4 mb-8">

                    <label class="relative inline-flex items-center cursor-pointer">

                        <input type="checkbox"checked class="sr-only peer">

                        <div
                            class="w-11 h-6 bg-gray-300 rounded-full peer peer-checked:bg-blue-600">
                        </div>

                    </label>

                    <span>
                        Acepta entregas
                    </span>

                </div> --}}

                {{-- Tarjetas --}}
                <div class="grid grid-cols-3 gap-6">

                    @foreach($submitted as $submission)

                        <div
                            class="border rounded-lg p-4 hover:shadow-md transition">

                            <div class="flex items-center gap-2 mb-4">

                                <div
                                    class="w-8 h-8 rounded-full bg-green-700 text-white flex items-center justify-center">

                                    {{ strtoupper(substr($submission->user->name,0,1)) }}

                                </div>

                                <span class="text-sm">
                                    {{ $submission->user->name }}
                                </span>

                            </div>

                            @if($submission->file)

                                <a href="{{ asset($submission->file) }}"
                                   target="_blank">

                                    <div
                                        class="h-36 border rounded bg-gray-100 flex items-center justify-center">

                                        <ion-icon
                                            name="document-outline"
                                            class="text-5xl text-gray-500">
                                        </ion-icon>

                                    </div>

                                    <p class="mt-3 truncate">
                                        {{ basename($submission->file) }}
                                    </p>

                                    <p class="text-green-700">
                                        Entregado
                                    </p>

                                </a>

                            @endif

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>
</x-app-layout>