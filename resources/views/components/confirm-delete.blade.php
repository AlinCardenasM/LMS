@props([
    'route',
    'title' => '¿Eliminar registro?',
    'description' => 'Esta acción no se puede deshacer.'
])

<button
    onclick="document.getElementById('modal-{{ md5($route) }}').showModal()"
    {{ $attributes->merge(['class' => 'text-red-600']) }}
>
    Borrar
</button>

<dialog
    id="modal-{{ md5($route) }}"
    class="rounded-xl p-6 shadow-xl backdrop:bg-black/50"
>
    <h2 class="text-lg font-semibold">{{ $title }}</h2>

    <p class="text-sm text-gray-500 mt-1">
        {{ $description }}
    </p>

    <div class="flex justify-end gap-3 mt-6">

        <button
            onclick="document.getElementById('modal-{{ md5($route) }}').close()"
            class="px-4 py-2 rounded-lg border text-gray-600"
        >
            Cancelar
        </button>

        <form action="{{ $route }}" method="POST">
            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="px-4 py-2 rounded-lg bg-red-600 text-white"
            >
                Sí, eliminar
            </button>
        </form>

    </div>
</dialog>