<x-links.btn-primary class="px-3 py-2 text-xs font-medium" href="/" :active="request()->routeIs('home')">Home</x-links.btn-primary>
<x-links.btn-primary class="px-3 py-2 text-xs font-medium" href="/members" :active="request()->routeIs('member')">Team</x-links.btn-primary>
<x-links.btn-primary class="px-3 py-2 text-xs font-medium" href="/posts" :active="request()->routeIs('post*')">Blog</x-links.btn-primary>
<x-links.btn-primary class="px-3 py-2 text-xs font-medium" href="/albums" :active="request()->routeIs('albums.index')">Album</x-links.btn-primary>
<x-links.btn-primary class="px-3 py-2 text-xs font-medium" href="/calender" :active="request()->routeIs('calender*')">Calender</x-links.btn-primary>
