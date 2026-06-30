{{-- PANEL DERECHO --}}
<section class="col-span-8">

    {{-- Encabezado --}}
    <div class="border-b p-8">
        <h1 class="text-3xl font-light">{{ $assignment->title }}</h1>
        <div class="absolute right-8">
            <x-menus.grade-menu
            :createRoute="route('submissions.grade.create', [
                'course' => $course,
                'assignment' => $assignment,
                'submission' => $selectedSubmission,
            ])"
            :editRoute="route('submissions.grade.edit', [
                'course' => $course,
                'assignment' => $assignment,
                'submission' => $selectedSubmission,
            ])"
            />

        </div>
        <div class="flex gap-12 mt-6">
            <div>
                <p class="text-4xl font-light">{{ $submitted->count() }}</p>
                <p class="text-gray-500">Entregadas</p>
            </div>
            <div>
                <p class="text-4xl font-light">{{ $assigned->count() }}</p>
                <p class="text-gray-500">Pendientes</p>
            </div>
            
        </div>
    </div>

    {{-- Contenido --}}
    <div class="p-8">

        @isset($selectedSubmission)

            {{-- Cabecera del alumno --}}
            <div class="flex items-center gap-4 mb-6">
                <div class="w-11 h-11 rounded-full bg-green-700 text-white flex items-center justify-center font-semibold">
                    {{ strtoupper(substr($selectedSubmission->user->name, 0, 1)) }}
                </div>
                <div>
                    <p class="font-semibold">{{ $selectedSubmission->user->name }}</p>
                    <p class="text-sm text-gray-500">
                        Entregado el {{ $selectedSubmission->created_at->format('d M, g:i a') }}
                    </p>
                </div>
            </div>

            {{-- Archivos --}}
            @if($selectedSubmission->files->isNotEmpty())  {{-- ✅ $selectedSubmission --}}
                <div class="space-y-3">
                    @foreach($selectedSubmission->files as $file)
                        <a
                            href="{{ Storage::url($file->path) }}"
                            target="_blank"
                            class="flex items-center justify-between border rounded-lg p-4 hover:bg-gray-50">
                            <div>
                                <p class="font-medium">{{ $file->original_name }}</p>
                                <small class="text-gray-500">{{ number_format($file->size / 1024, 0) }} KB</small>
                            </div>
                            <ion-icon name="download-outline" class="text-xl"></ion-icon>
                        </a>
                    @endforeach
                </div>
            @endif

            {{-- Comentario --}}
            @if($selectedSubmission->comment)
                <div class="border rounded-lg p-5 mt-6">
                    <h3 class="font-semibold mb-2">Comentario del alumno</h3>
                    <p class="text-gray-700 whitespace-pre-line">{{ $selectedSubmission->comment }}</p>
                </div>
            @endif

        @else

            <div class="flex flex-col items-center justify-center py-24 text-gray-500">
                <ion-icon name="document-text-outline" class="text-7xl mb-5"></ion-icon>
                <h2 class="text-xl font-semibold mb-2">Ninguna entrega seleccionada</h2>
                <p>Selecciona un alumno del panel izquierdo para ver su entrega.</p>
            </div>

        @endisset

    </div>

</section>