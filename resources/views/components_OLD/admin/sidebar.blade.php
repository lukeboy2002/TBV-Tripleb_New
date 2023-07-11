<div id="containerSidebar">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="/">
            TBV-TripleB
        </a>

        <div class="mt-10 space-y-4">
            <x-links.dropdown class="block" href="{{ route('admin.settings') }}" :active="request()->routeIs('admin.settings')">
                <i class="fa-solid fa-house mr-4"></i>Dashboard
            </x-links.dropdown>

            <x-links.dropdown class="block" href="{{ route('admin.slides.index') }}" :active="request()->routeIs('admin.slides*')">
                <i class="fa-regular fa-images mr-4"></i>Slides
            </x-links.dropdown>
            <x-links.dropdown class="block" href="{{ route('admin.sponsors.index') }}" :active="request()->routeIs('admin.sponsors*')">
                <i class="fa-solid fa-hand-holding-dollar mr-4"></i>Sponsors
            </x-links.dropdown>
            <x-links.dropdown class="block" href="{{ route('admin.events.index') }}" :active="request()->routeIs('admin.events*')">
                <i class="fa-solid fa-calendar-days mr-4"></i>Events
            </x-links.dropdown>
            <x-links.dropdown class="block" href="{{ route('admin.albums.index') }}" :active="request()->routeIs('admin.albums*')">
                <i class="fa-solid fa-photo-film mr-4"></i>Albums
            </x-links.dropdown>
            <div class="relative">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="m-4 w-full border-t border-gray-200 dark:border-gray-700"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-white dark:bg-gray-800 px-2 text-sm text-gray-500">Users & Members</span>
                </div>
            </div>

            <div id="accordion-collapse" data-accordion="collapse">
                <p id="accordion-collapse-heading-1">
                    <button type="button" class="flex items-center justify-between w-full px-4 mb-1 text-sm text-left text-gray-500 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                        <span><i class="fa-solid fa-users mr-4"></i>Users</span>
                        <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </p>
                <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                    <div>
                        <x-links.dropdown class="block" href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.*')">
                            <span class="ml-10">All Users</span>
                        </x-links.dropdown>
                        <x-links.dropdown class="block" href="{{ route ('admin.showInvitation') }}" :active="request()->routeIs('admin.showInvitation')">
                            <span class="ml-10">Invited Users</span>
                        </x-links.dropdown>
{{--                        <x-links.dropdown class="block" href="{{ route ('admin.createInvitation') }}" :active="request()->routeIs('admin.createInvitation')">--}}
{{--                            <span class="ml-10">Invite User</span>--}}
{{--                        </x-links.dropdown>--}}
{{--                        <x-links.dropdown class="block" href="{{ route ('admin.members.index') }}" :active="request()->routeIs('admin.members.index')">--}}
{{--                            <span class="ml-10">All Members</span>--}}
{{--                        </x-links.dropdown>--}}
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="m-4 w-full border-t border-gray-200 dark:border-gray-700"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-white dark:bg-gray-800 px-2 text-sm text-gray-500">Blog</span>
                </div>
            </div>
            <x-links.dropdown class="block" href="{{ route('admin.categories.index') }}" :active="request()->routeIs('admin.categories*')">
                <i class="fa-solid fa-list mr-4"></i>Categories
            </x-links.dropdown>
            <x-links.dropdown class="block" href="{{ route('admin.posts.index') }}" :active="request()->routeIs('admin.posts*')">
                <i class="fa-solid fa-blog mr-4"></i>BlogPost
            </x-links.dropdown>

{{--            <x-links.dropdown class="block">--}}
{{--                <i class="fa-solid fa-chart-pie mr-4"></i>Charts--}}
{{--            </x-links.dropdown>--}}

{{--            <x-links.dropdown class="block" href="/">--}}
{{--                <i class="fa-solid fa-toggle-on mr-4"></i>Buttons--}}
{{--            </x-links.dropdown>--}}

{{--            <x-links.dropdown class="block" href="/">--}}
{{--                <i class="fa-solid fa-copy mr-4"></i>Modals--}}
{{--            </x-links.dropdown>--}}

{{--            <x-links.dropdown class="block" href="/">--}}
{{--                <i class="fa-solid fa-table-cells mr-4"></i>Tables--}}
{{--            </x-links.dropdown>--}}
        </div>
    </div>
</div>
