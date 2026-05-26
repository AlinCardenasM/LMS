@props(['assignment'])

<div class="bg-white rounded-lg shadow-md p-8">
    {{-- Header --}}
    <div class="flex items-start justify-between border-b pb-6">
        <div class="flex items-start gap-4">
            {{-- Icono --}}
            <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                <ion-icon name="clipboard-outline" class="text-2xl text-gray-700"></ion-icon>
            </div>
            {{-- Información --}}
            <div>
                <h1 class="text-5xl font-normal text-gray-800">
                    {{ $assignment->title }}
                </h1>
                <div class="flex items-center gap-2 mt-2 text-gray-600">
                    <span>{{$assignment->created_at}}</span>
                </div>
            </div>
        </div>
    </div>
    <div>
        <p class="mt-2 text-gray-600">
            {{ $assignment->description }}
        </p>
    </div>
    <div class="max-w-4xl mx-auto py-6">
        @foreach($assignment->files as $file)
            <x-assignments.assignment-file :file="$file" />
        @endforeach
    </div>
</div>