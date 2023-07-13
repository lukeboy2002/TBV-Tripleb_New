<x-link.btn-primary class="px-3 py-2 text-xs font-medium" href="/" :active="request()->routeIs('home')">
    <i class="fa-sharp fa-solid fa-house text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white mr-2"></i>
    Home
</x-link.btn-primary>
<x-link.btn-primary class="px-3 py-2 text-xs font-medium" href="/members" :active="request()->routeIs('member')">
    <i class="fa-solid fa-people-group text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white mr-2"></i>
    Team
</x-link.btn-primary>
<x-link.btn-primary class="px-3 py-2 text-xs font-medium" href="/posts" :active="request()->routeIs('post*')">
    <i class="fa-solid fa-blog text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white mr-2"></i>
    Blog
</x-link.btn-primary>
<x-link.btn-primary class="px-3 py-2 text-xs font-medium" href="/albums" :active="request()->routeIs('albums.index')">
    <i class="fa-solid fa-images text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white mr-2"></i>
    Album
</x-link.btn-primary>
<x-link.btn-primary class="px-3 py-2 text-xs font-medium" href="/calender" :active="request()->routeIs('calender*')">
    <i class="fa-solid fa-calendar-days text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white mr-2"></i>
    Calender
</x-link.btn-primary>
