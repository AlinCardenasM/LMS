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

    }

@endphp

<div class="flex items-center justify-between p-4 border-b">

    {{-- Información izquierda --}}
    <div class="flex items-center gap-3">
        <div class="bg-gray-100 p-3 rounded-full"> 
            <ion-icon name="{{ $icon }}"></ion-icon> 
        </div>

        <div>
            <a href="{{ $showRoute }}"> {{ $item->title }} </a>
            <p class="text-sm text-gray-500">
                Publicado:
                {{ $item->created_at->format('d M') }}
            </p>
        </div>
    </div>

    {{-- Menú derecha --}}
    @if (auth()->user()->role === 'profesor')
        <div> 
            <x-menus.dropdown-actions :editRoute="$editRoute" :deleteRoute="$deleteRoute" :title="'¿Deseas eliminar '.$item->title.'?'" /> 
        </div>
    @endif

</div>