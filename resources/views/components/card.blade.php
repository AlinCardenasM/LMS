@props(['image', 'title', 'description'])

<div class="bg-white dark:bg-gray-800 rounded-sm shadow-md overflow-hidden hover:shadow-lg transition h-full flex flex-col ">
    
    <!-- Imagen -->
    <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-40 object-cover">

    <!-- Contenido -->
    <div class="p-4 flex flex-col flex-1">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
            {{ $title }}
        </h3>

        <p class="text-gray-600 dark:text-gray-300 text-sm mt-2 flex-1">
            {{ $description }}
        </p>

        <div class="mt-4">
            {{ $slot }}
        </div>
    </div>
</div>