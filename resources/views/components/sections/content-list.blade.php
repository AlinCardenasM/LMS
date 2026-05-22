@props(['content', 'course'])

<div class="flex items-center justify-between p-4 border-b">

    {{-- Información izquierda --}}
    <div class="flex items-center gap-3">

        <div class="bg-gray-100 p-3 rounded-full">
            <ion-icon name="document-text-outline"></ion-icon>
        </div>

        <div>
            <a href="{{ route('courses.contents.show', [$course, $content]) }}">{{ $content->title }}</a>

            <p class="text-sm text-gray-500">
                Publicado:
                {{ $content->created_at->format('d M') }}
            </p>

        </div>

    </div>

    {{-- Menú derecha --}}
    <div>
        <x-menus.dropdown-actions
            :editRoute="route('courses.contents.edit', [$course, $content])"
            :deleteRoute="route('courses.contents.destroy', [$course, $content])"
            :title="'¿Deseas eliminar  ' . $content->title . '?'"
        />
    </div>

</div>