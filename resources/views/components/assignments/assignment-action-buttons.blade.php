@props(['assignment', 'course'])

<div>

    <button class="w-full mt-6 border rounded-full py-3 font-medium bg-blue-600 text-white hover:bg-blue-500 transition">
        <a href="{{ route('courses.assignments.submissions.create', [$course, $assignment]) }}">+ Añadir o crear</a>
    </button>

    <p class="text-sm text-gray-500 text-center mt-6 italic">

        No se pueden entregar trabajos después
        de la fecha de entrega

    </p>

</div>