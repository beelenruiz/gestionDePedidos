@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 text-sm border-red-900 font-medium leading-5 text-red-900 bg-gray-100 focus:outline-none focus:border-red-900/70 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 text-sm border-transparent font-medium leading-5 text-red-900/70 hover:text-red-900 hover:border-red-900/70 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
