<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Editar calificación') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-2">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @include('fragment.errors_forms')
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-2xl p-6">
                <form method="POST" action="{{ route('submissions.grade.update', [
                    'course' => $course,
                    'assignment' => $assignment,
                    'submission' => $submission,
                ]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    @include('lms.grade.form')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>