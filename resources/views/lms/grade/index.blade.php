<x-app-layout>
    <x-nav-classroom :course="$course->id"/>
    <div class="max-w-7xl mx-auto py-8 px-6">
        <div class="overflow-x-auto bg-white rounded-lg shadow">

            <table class="min-w-full border-collapse">

                <thead>

                    <tr class="border-b bg-gray-50">

                        {{-- Alumno --}}
                        <th class="sticky left-0 bg-gray-50 p-4 text-left min-w-[250px]">
                            Alumno
                        </th>

                        {{-- Tareas --}}
                        @foreach($assignments as $assignment)
                            @php
                                $submission = $assignment->submissions->first();
                            @endphp

                            @if ($submission)
                                <th class="p-4 min-w-[180px] text-left">
                                    <a href="{{ route('courses.assignments.submissions.show', [
                                        'course' => $course,
                                        'assignment' => $assignment,
                                        'submission' => 1,
                                    ]) }}" class="font-medium text-blue-700">
                                        {{ $assignment->title }}
                                    </a>

                                    <div class="text-sm text-gray-500 mt-2">
                                        de {{ $assignment->max_score }}
                                    </div>
                                </th>
                                
                            @else
                                <span>{{ $assignment->title }}</span>
                            @endif


                        @endforeach

                    </tr>

                </thead>

                <tbody>

                    {{-- Promedio de clase --}}
                    <tr class="border-b bg-gray-50">

                        <td class="sticky left-0 bg-gray-50 p-4 font-semibold">
                            Media de la clase
                        </td>

                        @foreach($assignments as $assignment)

                            @php

                                $average = \App\Models\Grade::whereHas(
                                    'submission',
                                    fn($q) => $q->where(
                                        'assignment_id',
                                        $assignment->id
                                    )
                                )->avg('score');

                            @endphp

                            <td class="p-4 font-semibold">
                                {{ $average ? round($average,1) : '-' }}
                            </td>

                        @endforeach

                    </tr>

                    {{-- Alumnos --}}
                    @foreach($students as $student)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="sticky left-0 bg-white p-4">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center">

                                        {{ strtoupper(substr($student->name,0,1)) }}

                                    </div>

                                    <span>
                                        {{ $student->name }}
                                    </span>

                                </div>

                            </td>

                            @foreach($assignments as $assignment)

                                @php

                                    $submission = $assignment->submissions
                                        ->where('user_id', $student->id)
                                        ->first();

                                    $grade = $submission?->grade;

                                @endphp

                                <td class="p-4">

                                    @if($grade)

                                        <span class="text-green-700 font-medium">
                                            {{ $grade->score }}/{{ $assignment->max_score }}
                                        </span>

                                    @else

                                        <span class="text-gray-400">
                                            —
                                        </span>

                                    @endif

                                </td>

                            @endforeach

                        </tr>

                    @endforeach

                </tbody>

            </table>
            <div class="p-4">
                {{ $assignments->links() }}
            </div>
        </div>
    </div>
</x-app-layout>