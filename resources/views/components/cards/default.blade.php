@php
    $classes = 'bg-white border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700';
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
