@props(['item', 'course', 'type'])

@php

    if($type === 'content'){

        $showRoute = route('courses.contents.show', [$course,$item]);
        $editRoute = route('courses.contents.edit', [$course,$item]);
        $deleteRoute = route('courses.contents.destroy', [$course,$item]);
        $icon = 'document-text-outline';

    }else{

        $showRoute = route('courses.assignments.show', [$course,$item]);
        $editRoute = route('courses.assignments.edit', [$course,$item]);
        $deleteRoute = route('courses.assignments.destroy', [$course,$item]);
        $icon = 'clipboard-outline';
        $assignedCount = $course->users()->count();

        $submittedCount = $item->submissions()
            ->distinct('user_id')
            ->count('user_id');

    }

@endphp

<div class="flex items-center justify-between p-4 border-b">

    {{-- Información izquierda --}}
    <div class="flex items-center gap-3">
        <div class="bg-gray-100 p-3 rounded-full">
            <ion-icon name="{{ $icon }}"></ion-icon>
        </div>

        <div>
            <a href="{{ $showRoute }}">
                {{ $item->title }}
            </a>

            <p class="text-sm text-gray-500">
                Publicado:
                {{ $item->created_at->format('d M') }}
            </p>
        </div>
    </div>

    {{-- Información derecha --}}
    <div class="flex items-center gap-8">

        @if($type === 'assignment' && auth()->user()->role === 'profesor')

            <div class="flex">

                <div class="px-5 border-r text-center">
                    <p class="text-2xl font-light text-gray-600">
                        {{ $submittedCount }}
                    </p>

                    <a class="text-sm text-gray-600" href="{{ route('assignments.review', [$course, $item]) }}">Entregadas</a>
                </div>

                <div class="px-5 text-center">
                    <p class="text-2xl font-light text-gray-600">
                        {{ $assignedCount }}
                    </p>
                    <a class="text-sm text-gray-600" href="{{ route('assignments.review', [$course, $item]) }}">Asignadas</a>
                </div>

            </div>

        @endif

        @if(auth()->user()->role === 'profesor')
            <x-menus.dropdown-actions
                :editRoute="$editRoute"
                :deleteRoute="$deleteRoute"
                :title="'¿Deseas eliminar '.$item->title.'?'"
            />
        @endif

    </div>

</div>