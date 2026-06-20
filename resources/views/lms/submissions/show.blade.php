<x-app-layout>

    <div class="bg-white min-h-screen">

        {{-- Barra superior --}}
        <div class="border-b px-6 py-3 flex items-center gap-4">

            <button
                class="bg-gray-200 px-6 py-2 rounded-full text-gray-500">
                Enviar
            </button>

            <button>
                <ion-icon
                    name="mail-outline"
                    class="text-xl">
                </ion-icon>
            </button>

            <div class="ml-auto">

                <select
                    class="border rounded px-4 py-2">

                    <option>
                        {{ $assignment->max_score }} puntos
                    </option>

                </select>

            </div>

        </div>

        {{-- Contenido --}}
        <div class="grid grid-cols-12 min-h-[700px]">

            {{-- PANEL IZQUIERDO --}}
            <div class="col-span-5 border-r">

                {{-- Todos los alumnos --}}
                <div class="p-6 border-b">

                    <div
                        class="flex items-center gap-3 font-semibold">

                        <ion-icon
                            name="people-outline">
                        </ion-icon>

                        Todos los alumnos

                    </div>

                </div>

                {{-- Entregados --}}
                <div class="border-b">

                    <div class="p-4 font-semibold">
                        Entregado
                    </div>

                    @foreach($submitted as $submission)

                        <div
                            class="flex items-center justify-between p-4 border-t">

                            <div class="flex items-center gap-3">

                                <div
                                    class="w-10 h-10 rounded-full bg-green-700 text-white flex items-center justify-center">

                                    {{ strtoupper(substr($submission->user->name,0,1)) }}

                                </div>

                                <span>
                                    {{ $submission->user->name }}
                                </span>

                            </div>

                            <span class="text-green-700">
                                {{ $submission->grade?->score ?? '_' }}/{{ $assignment->max_score }}
                            </span>

                        </div>

                    @endforeach

                </div>

                {{-- Asignados --}}
                <div>

                    <div class="p-4 font-semibold">
                        Asignado
                    </div>

                    @foreach($assigned as $student)

                        <div
                            class="flex items-center justify-between p-4 border-t">

                            <div class="flex items-center gap-3">

                                <div
                                    class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center">

                                    {{ strtoupper(substr($student->name,0,1)) }}

                                </div>

                                <span>
                                    {{ $student->name }}
                                </span>

                            </div>

                            <span class="text-gray-400">
                                —
                            </span>

                        </div>

                    @endforeach

                </div>

            </div>

            {{-- PANEL DERECHO --}}
            <div class="col-span-7 p-6">

                <h1 class="text-3xl mb-6">
                    {{ $assignment->title }}
                </h1>

                {{-- Estadísticas --}}
                <div class="flex gap-12 mb-8">

                    <div>
                        <p class="text-3xl">
                            {{ $submitted->count() }}
                        </p>

                        <p class="text-gray-600">
                            Entregada
                        </p>
                    </div>

                    <div>
                        <p class="text-3xl">
                            {{ $assigned->count() }}
                        </p>

                        <p class="text-gray-600">
                            Asignada
                        </p>
                    </div>

                </div>

                {{-- Entregas --}}
                <div class="grid grid-cols-2 gap-6">

                    @foreach($submitted as $submission)

                        <div
                            class="border rounded-lg p-4 hover:shadow">

                            <div
                                class="flex items-center gap-2 mb-4">

                                <div
                                    class="w-8 h-8 rounded-full bg-green-700 text-white flex items-center justify-center">

                                    {{ strtoupper(substr($submission->user->name,0,1)) }}

                                </div>

                                <span>
                                    {{ $submission->user->name }}
                                </span>

                            </div>

                            @if($submission->file)

                                <div
                                    class="border rounded p-3">

                                    <ion-icon
                                        name="document-outline"
                                        class="text-4xl">
                                    </ion-icon>

                                    <p
                                        class="truncate mt-2">

                                        {{ basename($submission->file) }}

                                    </p>

                                    <span
                                        class="text-green-700">

                                        Entregado

                                    </span>

                                </div>

                            @endif

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</x-app-layout>