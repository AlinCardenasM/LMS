@props([
    'name' => 'Proyecto final.pdf',
    'type' => 'PDF',
    'image' => 'https://placehold.co/80x80'
])

<div class="border rounded-xl flex items-center overflow-hidden">

    <div class="flex-1 p-4">

        <a href="#" class="underline font-medium">
            {{ $name }}
        </a>

        <p class="text-gray-500 text-sm">
            {{ $type }}
        </p>

    </div>

    <div class="border-l p-2">

        <img
            src="{{ $image }}"
            class="w-20"
        >

    </div>

    <button class="px-4 text-gray-500 text-xl">

        <ion-icon name="close-outline"></ion-icon>

    </button>

</div>