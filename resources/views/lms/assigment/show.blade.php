<x-app-layout>
    @if (auth()->user()->role === 'profesor')
        <x-menus.assignments-professor :course='$course' :assignment='$assignment' />
    @endif
    <div class="max-w-7xl mx-auto py-8 px-6">
        <div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-8">
            <x-assignments.assignment-principal-card :assignment="$assignment" />
            {{-- PANEL DERECHO --}}
            @if ($submission?->files)
                <x-assignments.assignment-card-update :assignment="$assignment" :course="$course"        :submission="$submission"/>
            @else
                <x-assignments.assignment-card-create :assignment="$assignment" :course="$course"       :submission="$submission"/>
            @endif
        </div>
    </div>
</x-app-layout>