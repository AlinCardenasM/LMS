<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-6">
        <div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-8">
            <x-assignments.assignment-principal-card :assignment="$assignment" />
            {{-- PANEL DERECHO --}}
            <x-assignments.assignment-card />
        </div>
    </div>
</x-app-layout>