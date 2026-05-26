@props([
    'status' => 'Calificado'
])

<div class="flex justify-between mb-6">

    <h2 class="text-2xl font-medium">
        Tu trabajo
    </h2>

    <p class="font-medium">
        {{ $status }}
    </p>

</div>