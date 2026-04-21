<x-app-layout>

    <div class="min-h-screen bg-gray-100">
        <!-- HEADER / BANNER -->
        <div class="max-w-6xl mx-auto mt-6">
            <div class="relative bg-gray-700 rounded-xl h-48 p-6 text-white flex items-start justify-between">
                
                <!-- Título -->
                <h1 class="text-3xl font-semibold">Test</h1>

                <!-- Botón -->
                <button class="bg-white text-blue-600 px-4 py-2 rounded-full shadow hover:bg-gray-100">
                    Personalizar
                </button>
            </div>
        </div>

        <!-- CONTENIDO -->
        <div class="max-w-6xl mx-auto mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- SIDEBAR -->
            <div class="space-y-4">

                <!-- Código -->
                <div class="bg-white p-4 rounded-xl shadow">
                    <p class="text-sm text-gray-500">Código de clase</p>
                    <p class="text-xl font-semibold mt-2">njynfum5</p>
                </div>

                <!-- Próximas entregas -->
                <div class="bg-white p-4 rounded-xl shadow">
                    <p class="font-medium">Próximas entregas</p>
                    <p class="text-sm text-gray-500 mt-2">
                        No tienes ninguna tarea para esta semana
                    </p>
                    <a href="#" class="text-blue-600 text-sm mt-2 inline-block">
                        Ver todo
                    </a>
                </div>

            </div>

            <!-- CONTENIDO PRINCIPAL -->
            <div class="md:col-span-2 space-y-4">

                <!-- Acciones -->
                <div class="flex items-center gap-4">
                    <button class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full hover:bg-blue-200">
                        + Nuevo anuncio
                    </button>

                    <a href="#" class="text-blue-600">
                        Volver a publicar
                    </a>
                </div>

                <!-- Card principal -->
                <div class="bg-white p-6 rounded-xl shadow flex items-center justify-between">

                    <div>
                        <h2 class="text-lg font-semibold">
                            Aquí puedes comunicarte con tu clase
                        </h2>
                        <p class="text-gray-500 text-sm mt-2">
                            Usa el tablón para publicar anuncios o tareas y responder a preguntas de los alumnos
                        </p>
                    </div>

                    <button class="border border-gray-300 px-4 py-2 rounded-full text-blue-600 hover:bg-gray-100">
                        Ajustes del tablón
                    </button>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
