<x-app-layout>
    <x-slider />

    <x-blog.grid>
        <x-slot name="blog">
            <x-main-layout.heading>In the Spotlight</x-main-layout.heading>
            <div class="py-4">
                <x-latest-post />
            </div>
        </x-slot>
        <x-slot name="side">
            <x-main-layout.heading>Hot news</x-main-layout.heading>
            <div class="py-4">
                <x-popular-posts />
            </div>
        </x-slot>
    </x-blog.grid>


</x-app-layout>
