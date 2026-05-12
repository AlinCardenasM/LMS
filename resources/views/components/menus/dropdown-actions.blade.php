@props([
    'editRoute',
    'deleteRoute',
    'title' => '¿Deseas eliminar este registro?'
])

<div x-data="{ open: false }" class="relative">

    <!-- Icono -->
    <button
        @click="open = !open"
        class="text-gray-300 hover:text-gray-500"
    >
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

            {{-- Editar --}}
            <li>
                <a
                    href="{{ $editRoute }}"
                    class="block px-4 py-2 hover:bg-blue-100"
                >
                    Editar
                </a>
            </li>

            {{-- Eliminar --}}
            <li>

                <x-confirm-delete
                    class="block w-full text-left px-4 py-2 hover:bg-blue-100"
                    :route="$deleteRoute"
                    :title="$title"
                    description="Esta acción no se puede deshacer."
                />

            </li>

        </ul>
    </div>

</div>