@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group bg-orange-500 dark:text-white hover:bg-orange-500'
                : 'flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-orange-500 dark:text-white dark:hover:bg-orange-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

{{--Bovenste rij is active--}}

{{--<class="px-3 py-2 text-xs font-medium">Extra small DEFAULT--}}
{{--<class="px-3 py-2 text-sm font-medium">Small--}}
{{--<class="px-5 py-2.5 text-sm font-medium">Base--}}
{{--<class="px-5 py-3 text-base font-medium">Large--}}
{{--<class="px-6 py-3.5 text-base font-medium">Extra large--}}
