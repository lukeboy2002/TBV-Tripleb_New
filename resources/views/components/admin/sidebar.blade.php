<div>
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="/">
            TBV-TripleB
        </a>
    </div>

    <div class="px-3 py-4 overflow-y-auto">
        <div class="space-y-2">
            <x-link.btn-menu href="{{ route('admin.settings') }}" :active="request()->routeIs('admin.settings')">
                <i class="fa-solid fa-gauge mr-2"></i>Dashboard
            </x-link.btn-menu>
            <x-main-layout.hr />
            <x-link.btn-menu href="{{ route('admin.permissions.index') }}" :active="request()->routeIs('admin.permissions*')">
                <i class="fa-solid fa-list mr-2"></i>Permissions
            </x-link.btn-menu>
            <x-link.btn-menu href="{{ route('admin.sponsors.index') }}" :active="request()->routeIs('admin.sponsors*')">
                <i class="fa-solid fa-gift mr-2"></i>Sponsors
            </x-link.btn-menu>
            <x-link.btn-menu href="{{ route('admin.slides.index') }}" :active="request()->routeIs('admin.slides*')">
                <i class="fa-solid fa-panorama mr-2"></i>Sliders
            </x-link.btn-menu>

{{--            DROPDOWN MENU USERS--}}
            <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-700 dark:text-white transition duration-75 rounded-lg group hover:bg-orange-500" aria-controls="dropdown-user" data-collapse-toggle="dropdown-user">
                <i class="fa-solid fa-users"></i>
                <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Users</span>
                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-user" class="hidden py-2 space-y-2">
                <x-link.btn-menu href="#" :active="request()->routeIs('admin.products*')">
                    <div class="pl-11">Products</div>
                </x-link.btn-menu>
                <li>
                    <x-link.btn-menu href="#" :active="request()->routeIs('admin.billing*')">
                        <div class="pl-11">Billing</div>
                    </x-link.btn-menu>
                </li>
                <li>
                    <x-link.btn-menu href="#" :active="request()->routeIs('admin.invoice*')">
                        <div class="pl-11">Invoice</div>
                    </x-link.btn-menu>
                </li>
            </ul>
{{--            DROPDOWN MENU USERS--}}

{{--            DROPDOWN MENU BLOG--}}
            <button type="button" class="flex items-center w-full p-2 text-base font-normal text-gray-700 dark:text-white transition duration-75 rounded-lg group hover:bg-orange-500" aria-controls="dropdown-blog" data-collapse-toggle="dropdown-blog">
                <i class="fa-solid fa-blog"></i>
                <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Blog</span>
                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="dropdown-blog" class="hidden py-2 space-y-2">
                <x-link.btn-menu href="#" :active="request()->routeIs('admin.products*')">
                    <div class="pl-11">Products</div>
                </x-link.btn-menu>
                <li>
                    <x-link.btn-menu href="#" :active="request()->routeIs('admin.billing*')">
                        <div class="pl-11">Billing</div>
                    </x-link.btn-menu>
                </li>
                <li>
                    <x-link.btn-menu href="#" :active="request()->routeIs('admin.invoice*')">
                        <div class="pl-11">Invoice</div>
                    </x-link.btn-menu>
                </li>
            </ul>
{{--            DROPDOWN MENU BLOG--}}

            <div class="block md:hidden">
                <x-main-layout.hr />

                <x-menu.mobile />
            </div>
        </div>
    </div>
</div>
