<div class="bg-white rounded-lg border p-4 shadow-sm">

    {{-- Información del alumno --}}
    <div class="flex items-center gap-3 mb-5">

        <div
            class="w-10 h-10 rounded-full bg-green-700 text-white flex items-center justify-center font-semibold">
            {{ strtoupper(substr($submission->user->name,0,1)) }}
        </div>

        <div>
            <h3 class="font-semibold text-gray-800">
                {{ $submission->user->name }}
            </h3>

            <span class="text-sm text-gray-500">
                Entregado el
                {{ $submission->created_at->translatedFormat('d M, h:i a') }}
            </span>
        </div>

    </div>

    {{-- Archivo --}}
    @if($submission->file_path)

        <div class="border rounded-xl p-4 mb-4">

            <div class="flex items-center gap-3 mb-3">

                <div class="bg-blue-100 p-2 rounded-lg">
                    📎
                </div>

                <div>
                    <h4 class="font-semibold">
                        Archivo adjunto
                    </h4>

                    <small class="text-gray-500">
                        Entregado con la tarea
                    </small>
                </div>

            </div>

            <div
                class="border rounded-lg p-3 flex justify-between items-center">

                <div class="flex items-center gap-3">

                    <div
                        class="w-12 h-12 bg-blue-600 rounded text-white flex items-center justify-center text-sm font-bold">
                        PDF
                    </div>

                    <div>

                        <div class="font-medium">
                            {{ basename($submission->file_path) }}
                        </div>

                        <small class="text-gray-500">
                            {{ number_format(Storage::disk('public')->size($submission->file_path)/1024,0) }}
                            KB
                        </small>

                    </div>

                </div>

                <a href="{{ Storage::url($submission->file_path) }}"
                   download
                   class="text-blue-600 hover:text-blue-800">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4"/>

                    </svg>

                </a>

            </div>

        </div>

    @endif

    {{-- Comentario --}}

    @if($submission->comment)

        <div class="border rounded-xl p-4">

            <div class="flex items-center gap-3 mb-3">

                <div class="bg-green-100 p-2 rounded-lg">
                    💬
                </div>

                <div>

                    <h4 class="font-semibold">
                        Comentario del alumno
                    </h4>

                    <small class="text-gray-500">
                        Enviado junto con la entrega
                    </small>

                </div>

            </div>

            <div class="border rounded-lg p-4 bg-gray-50">

                {{ $submission->comment }}

            </div>

        </div>

    @endif

</div>