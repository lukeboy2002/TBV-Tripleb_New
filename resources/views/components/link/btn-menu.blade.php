@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'flex items-center p-2 text-base font-normal text-white transition duration-75 rounded-lg group bg-orange-500 hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500'
                : 'flex items-center p-2 text-base font-normal text-gray-900 dark:text-white transition duration-75 rounded-lg group hover:text-white hover:bg-orange-500 focus:outline-none focus:bg-orange-500 focus:text-gray-900 dark:focus:text-white';
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
