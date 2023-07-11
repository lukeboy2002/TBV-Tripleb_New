@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'text-xs font-extrabold text-gray-900 dark:text-white focus:outline-none focus:underline transition duration-150 ease-in-out'
                : 'text-xs font-extrabold text-orange-500 hover:underline focus:outline-none focus:underline transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
