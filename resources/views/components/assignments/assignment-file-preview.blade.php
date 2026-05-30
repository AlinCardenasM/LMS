@props([
    'name',
    'type',
    'url'
])

<div class="border rounded-xl flex items-center overflow-hidden">

    <div class="flex-1 p-4">
        <a href="{{ $url }}" class="underline font-medium">
            {{ $name }}
        </a>
    </div>

    <button class="px-4 text-gray-500 text-xl">

        <ion-icon name="close-outline"></ion-icon>

    </button>

</div>