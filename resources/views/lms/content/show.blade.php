<x-app-layout>
    {{--  --}}
    <div class="min-h-screen bg-[#f5f5f5]">
        {{-- Contenedor principal --}}
        <div class="max-w-5xl mx-auto pt-8">
            
            {{-- Card blanca --}}
            <div class="bg-white rounded-lg shadow-md p-8">
                
                {{-- Header --}}
                <div class="flex items-start justify-between border-b pb-6">
                    <div class="flex items-start gap-4">
                        {{-- Icono --}}
                        <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                            <ion-icon
                                name="clipboard-outline"
                                class="text-2xl text-gray-700">
                            </ion-icon>
                        </div>
                        {{-- Información --}}
                        <div>
                            <h1 class="text-5xl font-normal text-gray-800">
                                {{ $content->title }}
                            </h1>
                            <div class="flex items-center gap-2 mt-2 text-gray-600">
                                <span class="font-medium">Alin Cárdenas</span>
                                <span>•</span>
                                <span>18:55</span>
                            </div>
                        </div>
                        
                    </div>
                    
                    {{-- Menú --}}
                    <button
                        class="text-gray-600 hover:bg-gray-200 rounded-full p-2 transition">
                        <ion-icon
                            name="ellipsis-vertical"
                            class="text-2xl">
                        </ion-icon>
                    </button>
                </div>
                <div>
                    <p class="mt-2 text-gray-600">
                        {{ $content->description }}
                    </p>
                </div>
                <div class="max-w-4xl mx-auto py-6">
                    @foreach($content->files as $file)
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

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{--  --}}

</x-app-layout>