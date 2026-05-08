@props(['type' => 'success'])

@if (session('success'))
    <div 
        {{ $attributes->class([
            'bg-green-100 text-green-700 border-green-400 border-l-4 p-4 rounded-lg text-sm mt-4'
        ]) }}
    >
        {{ session('success') }}
    </div>
@endif