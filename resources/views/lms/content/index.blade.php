<x-app-layout>
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
                                Revisar
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
            </div>
        </div>
    </div>
</x-app-layout>
