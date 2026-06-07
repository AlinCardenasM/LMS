<div class="flex flex-col items-center justify-center text-center mt-10">
    <!-- Imagen -->
    <img 
        src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png"
        class="w-32 opacity-70 mb-6"
        alt="Cursos"
    >

    <!-- Texto -->
    <h2 class="text-xl font-semibold text-gray-700">
        Aquí podrás ver tus cursos
    </h2>

    @if (auth()->user()->role==="profesor")
        <p class="text-gray-500 mt-2 max-w-md">
            Si creas a un curso, aparecerá en esta sección para que puedas
            acceder a sus contenidos, actividades y recursos de aprendizaje.
        </p>

        <!-- Botón opcional dentro del estado vacío -->
        <a href="{{ route('courses.create') }}" class="mt-6 inline-flex items-center px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Crear curso
        </a>
        
    @else
        <p class="text-gray-500 mt-2 max-w-md">
            Cuando te unas a un curso, aparecerá en esta sección para que puedas
            acceder a sus contenidos, actividades y recursos de aprendizaje.
        </p>

        <!-- Botón opcional dentro del estado vacío -->
        <a href="{{ route('enrollments.create') }}" class="mt-6 inline-flex items-center px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Unirme a un curso
        </a>
    @endif
</div> 