<x-app-layout>
    <x-slider />

    @if ($latestPost)
        <x-blog.item :post="$latestPost"/>
    @endif

</x-app-layout>
