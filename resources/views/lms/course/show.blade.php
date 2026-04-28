<x-app-layout>
    <x-nav-classroom/>
    <div class="min-h-screen bg-gray-100">
        <!-- HEADER / BANNER -->
        <div class="max-w-6xl mx-auto mt-6">
                <x-banner :title="$course->title" />
        </div>

        <!-- CONTENIDO -->
        <div class="max-w-6xl mx-auto mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- SIDEBAR -->
            <div class="space-y-4">
                <!-- Código -->
                <div class="bg-white p-4 rounded-xl shadow">
                    <p class="text-sm text-gray-500">Código de clase</p>
                    <p class="text-xl font-semibold mt-2">{{ $course->access_code }}</p>
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
            <x-board />
        </div>
    </div>
</x-app-layout>
