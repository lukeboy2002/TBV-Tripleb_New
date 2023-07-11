<x-dropdowns.default>
    <x-slot name="trigger">

        <button type="button" class="w-48 flex justify-between text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-500 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <i class="fa-solid fa-caret-down"></i>
        </button>
    </x-slot>

    <x-links.dropdown
        class="block" href="/posts/?{{ http_build_query(request()->except('category', 'page')) }}"
        :active="request()->routeIs('post') && is_null(request()->getQueryString())"
    >
        All
    </x-links.dropdown>

        @foreach ($categories as $category)
            <x-links.dropdown
                class="block"
                href="/posts/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
                :active='request()->fullUrlIs("*?category={$category->slug}*")'
            >
                {{ ucwords($category->name) }}
            </x-links.dropdown>
    @endforeach
</x-dropdowns.default>
