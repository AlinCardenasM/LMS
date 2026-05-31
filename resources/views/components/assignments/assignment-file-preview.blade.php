@props([
    'name',
    'url'
])

<div class="border rounded-xl flex items-center overflow-hidden">

    <div class="flex-1 p-4">
        <a href="{{ $url }}" class="underline font-medium">
            {{ $name }}
        </a>
    </div>

</div>