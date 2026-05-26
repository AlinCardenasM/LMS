@props([
    'status' => 'Calificado'
])

<div class="border bg-white rounded-2xl shadow-sm p-6">

    <x-assignments.assignment-card-header
        :status="$status"
    />


    {{-- <x-assignments.assignment-file-preview /> --}}

    <x-assignments.assignment-action-buttons />

</div>