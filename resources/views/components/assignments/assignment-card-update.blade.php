@props([
    'status' => 'Entregado',
    'assignment',
    'course',
    'submission'

])

<div class="border bg-white rounded-2xl shadow-sm p-6">

    <x-assignments.assignment-card-header
    :status="$status"
    />

    @foreach ($submission->files as $file)
        <x-assignments.assignment-file-preview :submission="$submission" :name="$file->original_name"
            :type="$file->mime_type"  :url="Storage::url($file->path)"/>
    @endforeach

    <div>
        <button class="w-full mt-6 border rounded-full py-3 font-medium bg-blue-600 text-white hover:bg-blue-500 transition">
            <a href="{{ route('courses.assignments.submissions.update', [$course, $assignment,$submission]) }}">Modificar entrega</a>
        </button>

        <button
            disabled
            class="w-full mt-4 py-4 rounded-full bg-gray-200 text-gray-500"
        >
            Volver a entregar
        </button>

        <p class="text-sm text-gray-500 text-center mt-6 italic">

            No se pueden entregar trabajos después
            de la fecha de entrega

        </p>

    </div>
</div>