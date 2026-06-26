<x-app-layout>

    <div class="bg-white min-h-screen">

        {{-- Encabezado --}}
        <x-menus.assignments-professor
            :course="$course"
            :assignment="$assignment" />

        <div class="grid grid-cols-12 min-h-[calc(100vh-65px)]">

            {{-- ===========================
                PANEL IZQUIERDO
            ============================ --}}
            <aside class="col-span-4 border-r">

                {{-- Cabecera --}}
                <div class="p-6 border-b">
                    <div class="flex items-center gap-3">

                        <ion-icon
                            name="people-outline"
                            class="text-2xl text-gray-600">
                        </ion-icon>

                        <div>

                            <h2 class="font-semibold">
                                Todos los alumnos
                            </h2>

                            <p class="text-sm text-gray-500">
                                {{ $submitted->count() + $assigned->count() }} alumnos
                            </p>

                        </div>

                    </div>
                </div>

                {{-- Entregados --}}
                <div class="border-b">

                    <div class="px-6 py-3 text-sm font-semibold uppercase text-gray-500">
                        Entregados
                    </div>

                    @foreach($submitted as $submission)

                        <a
                            href="{{ route('courses.assignments.submissions.show', [
                                        'course' => $course,
                                        'assignment' => $assignment,
                                        'submission' => $submission,
                                    ]) }}"

                            class="flex items-center justify-between border-t p-4 hover:bg-gray-50 transition
                            {{ isset($selectedSubmission) && $selectedSubmission->id == $submission->id ? 'bg-blue-50 border-l-4 border-blue-600' : '' }}">

                            <div class="flex items-center gap-4">

                                <div
                                    class="w-11 h-11 rounded-full bg-green-700 text-white flex items-center justify-center font-semibold">

                                    {{ strtoupper(substr($submission->user->name,0,1)) }}

                                </div>

                                <div>

                                    <p class="font-medium">
                                        {{ $submission->user->name }}
                                    </p>

                                    <p class="text-sm text-gray-500">
                                        Entregado
                                    </p>

                                </div>

                            </div>

                            <span class="font-semibold text-green-700">

                                {{ $submission->grade?->score ?? '_' }}/{{ $assignment->max_score }}

                            </span>

                        </a>

                    @endforeach

                </div>

                {{-- Pendientes --}}
                <div>

                    <div class="px-6 py-3 text-sm font-semibold uppercase text-gray-500">
                        Sin entregar
                    </div>

                    @foreach($assigned as $student)

                        <div class="flex items-center gap-4 border-t p-4">

                            <div
                                class="w-11 h-11 rounded-full bg-gray-400 text-white flex items-center justify-center font-semibold">

                                {{ strtoupper(substr($student->name,0,1)) }}

                            </div>

                            <div>

                                <p class="font-medium">
                                    {{ $student->name }}
                                </p>

                                <p class="text-sm text-gray-500">
                                    Pendiente
                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>

            </aside>

            @include('lms.submissions.card')

        </div>

    </div>

</x-app-layout>