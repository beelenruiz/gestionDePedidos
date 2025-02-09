@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400 text-start text-base font-medium text-red-900 bg-gray-100 focus:outline-none focus:text-red-900 focus:bg-red-900/70 focus:border-red-900/70 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-red-900/70 hover:text-text-900 hover:bg-gray-50 hover:border-red-900/70 focus:outline-none focus:text-red-900 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
