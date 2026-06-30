@props([
    'createRoute',
    'editRoute'
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
            <li> 
                <a href="{{ $createRoute }}" class="block px-4 py-2 hover:bg-blue-100">Calificar</a>
            </li>
            <li> 
                <a href="{{ $editRoute }}" class="block px-4 py-2 hover:bg-blue-100">Editar</a>
            </li>
        </ul>
    </div>

</div>