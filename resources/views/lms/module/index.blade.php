<x-app-layout>

    <!-- TABS -->
    <x-nav-classroom active="trabajo" />

    <div class="max-w-5xl mx-auto mt-6">

        <!-- BOTÓN CREAR -->
        <div class="flex justify-center mb-6">
            <a href="{{ route('module.create') }}" class="flex items-center gap-2 bg-blue-600 text-white px-5 py-2 rounded-full shadow hover:bg-blue-700 transition">
                <span class="text-lg">+</span>
                Crear
            </a>
        </div>

        <!-- LÍNEA -->
        <div class="border-t border-gray-300 mb-10"></div>

        <!-- ESTADO VACÍO -->
        <div class="flex flex-col items-center justify-center text-center mt-10">

            <!-- Imagen -->
            <img 
                src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png" 
                class="w-32 opacity-70 mb-6"
            >

            <!-- Texto -->
            <h2 class="text-lg font-medium text-gray-700">
                Aquí podrás asignar trabajos
            </h2>

            <p class="text-gray-500 mt-2 max-w-md">
                Puedes añadir tareas y otros trabajos para la clase y, después, organizarlos por temas
            </p>
        </div>
    </div>
</x-app-layout>