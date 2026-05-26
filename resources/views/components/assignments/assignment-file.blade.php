@props(['file'])
<a
    href="{{ Storage::url($file->path) }}"
    target="_blank"
    class="flex items-center gap-3 p-3 border rounded-lg hover:bg-gray-50 transition"
>

    {{-- PDF --}}
    @if($file->mime_type === 'application/pdf')

        <div class="w-10 h-10 flex items-center justify-center bg-red-100 rounded-lg">
            📄
        </div>

    {{-- Imagen --}}
    @elseif(Str::startsWith($file->mime_type, 'image/'))

        <div class="w-10 h-10 flex items-center justify-center bg-blue-100 rounded-lg">
            🖼️
        </div>

    {{-- Video --}}
    @elseif(Str::startsWith($file->mime_type, 'video/'))

        <div class="w-10 h-10 flex items-center justify-center bg-purple-100 rounded-lg">
            🎥
        </div>

    {{-- Word --}}
    @elseif(
        $file->mime_type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
    )

        <div class="w-10 h-10 flex items-center justify-center bg-blue-200 rounded-lg">
            📘
        </div>

    {{-- Excel --}}
    @elseif(
        $file->mime_type === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    )

        <div class="w-10 h-10 flex items-center justify-center bg-green-100 rounded-lg">
            📊
        </div>

    {{-- Otros --}}
    @else

        <div class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-lg">
            📁
        </div>

    @endif

    <div class="flex-1">

        <p class="font-medium text-gray-800">
            {{ $file->original_name }}
        </p>

        <p class="text-sm text-gray-500">
            {{ number_format($file->size / 1024, 2) }} KB
        </p>

    </div>

    <div class="text-gray-400">
        ↗
    </div>

</a>