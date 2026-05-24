<x-app-layout>

<div class="max-w-7xl mx-auto py-8 px-6">

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

        {{-- PANEL IZQUIERDO --}}
        <div class="lg:col-span-3 bg-white">

            {{-- Header --}}
            <div class="flex justify-between items-start">

                <div class="flex gap-4">

                    <div class="bg-purple-100 text-purple-600 p-4 rounded-full h-fit">
                        <ion-icon name="clipboard-outline" class="text-2xl"></ion-icon>
                    </div>

                    <div>

                        <h1 class="text-4xl font-normal">
                            {{ $assignment -> title }}
                        </h1>

                        <p class="text-gray-600 mt-2">
                            <span class="text-gray-500">
                                Última modificación: 
                                {{ $assignment -> created_at->format('d M') }}
                                
                            </span>
                        </p>
                    </div>
                </div>

                <button class="text-gray-500 text-2xl">
                    <ion-icon name="ellipsis-vertical"></ion-icon>
                </button>

            </div>

            <div class="mt-6 flex justify-between items-center">

                {{-- <p class="text-xl font-medium">
                    100/100
                </p> --}}

                {{-- <p class="font-medium">
                    Fecha de entrega: 
                    {{ $assignment -> \Carbon\Carbon::parse($assignment->due_date)->format('d M')  }}
                    9 dic 2025, 23:59
                </p> --}}

            </div>

            <hr class="my-6">

            {{-- Descripción --}}
            <div class="space-y-4 text-gray-800 leading-relaxed">
                <p>
                    {{ $assignment -> description }}
                </p>
            </div>

            {{-- Recurso --}}
            {{-- <div class="mt-8 border rounded-xl overflow-hidden w-fit">

                <div class="flex">

                    <div class="p-4 w-[320px]">

                        <a href="#" class="font-semibold underline">
                            Kaggle: The World's AI Proving Ground
                        </a>

                        <p class="text-gray-500 text-sm mt-2">
                            https://www.kaggle.com/
                        </p>

                    </div>

                    <img
                        src="https://placehold.co/150x90"
                        class="w-[150px] object-cover border-l"
                    >

                </div>

            </div> --}}

        </div>


        {{-- PANEL DERECHO --}}
        <div>

            <div class="border rounded-2xl shadow-sm p-6">

                <div class="flex justify-between mb-6">

                    <h2 class="text-2xl font-medium">
                        Tu trabajo
                    </h2>

                    <p class="font-medium">
                        Calificado
                    </p>

                </div>

                {{-- Archivo --}}
                <div class="border rounded-xl flex items-center overflow-hidden">

                    <div class="flex-1 p-4">

                        <a href="#" class="underline font-medium">
                            Proyecto final.pdf
                        </a>

                        <p class="text-gray-500 text-sm">
                            PDF
                        </p>

                    </div>

                    <div class="border-l p-2">
                        <img
                            src="https://placehold.co/80x80"
                            class="w-20"
                        >
                    </div>

                    <button class="px-4 text-gray-500 text-xl">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>

                </div>

                {{-- Botón --}}
                <button
                    class="w-full mt-6 border rounded-full py-3 font-medium text-blue-600 hover:bg-blue-50 transition">

                    + Añadir o crear

                </button>

                {{-- Disabled --}}
                <button
                    disabled
                    class="w-full mt-4 py-4 rounded-full bg-gray-200 text-gray-500">

                    Volver a entregar

                </button>

                <p class="text-sm text-gray-500 text-center mt-6 italic">
                    No se pueden entregar trabajos después
                    de la fecha de entrega
                </p>

            </div>

        </div>

    </div>

</div>

</x-app-layout>