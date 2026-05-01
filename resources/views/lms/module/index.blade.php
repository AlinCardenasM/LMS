<x-app-layout>
    <x-nav-classroom :course="$course->id"/>
    <div class="max-w-5xl mx-auto mt-6">
        <x-create-menu :course="$course->id"/>
        <x-empy-state/>
    </div>
</x-app-layout>