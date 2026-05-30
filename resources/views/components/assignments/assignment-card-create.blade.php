@props([
    'status' => 'Asignado',
    'assignment',
    'course',
    'submission'

])

<div class="border bg-white rounded-2xl shadow-sm p-6">

    <x-assignments.assignment-card-header
    :status="$status"
    />
    
    <x-assignments.assignment-action-buttons :assignment="$assignment" :course="$course"/>

</div>