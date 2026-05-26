<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Subir tarea') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-2">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-2xl p-6">
                @include('fragment.errors_forms')
                <form method="POST" action="{{ route('courses.assignments.submissions.store', [$course, $assignment]) }}" enctype="multipart/form-data">
                    @csrf
                    @include('lms.submissions.form')
                    <div class="mt-6 flex justify-end">
                        <x-primary-button>Subir tarea</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>