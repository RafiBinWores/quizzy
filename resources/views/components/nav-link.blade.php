@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-blue-600 font-medium transition px-2 py-1 flex items-center rounded-lg'
            : 'text-gray-700 hover:text-blue-600 font-medium transition px-2 py-1 flex items-center rounded-lg';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
