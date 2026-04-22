@props(['title' => 'Clase'])

<div class="relative bg-gray-700 rounded-xl h-48 p-6 text-white flex items-start justify-between">
    <h1 class="text-3xl font-semibold">{{ $title }}</h1>

    <button class="bg-white text-blue-600 px-4 py-2 rounded-full shadow hover:bg-gray-100">
        Personalizar
    </button>
</div>