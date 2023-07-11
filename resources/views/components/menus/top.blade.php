<x-links.btn-primair class="px-3 py-2 text-xs font-medium" href="/" :active="request()->routeIs('home')">Home</x-links.btn-primair>
<x-links.btn-primair class="px-3 py-2 text-xs font-medium" href="/members" :active="request()->routeIs('member')">Team</x-links.btn-primair>
<x-links.btn-primair class="px-3 py-2 text-xs font-medium" href="/posts" :active="request()->routeIs('post*')">Blog</x-links.btn-primair>
<x-links.btn-primair class="px-3 py-2 text-xs font-medium" href="/albums" :active="request()->routeIs('albums.index')">Album</x-links.btn-primair>
<x-links.btn-primair class="px-3 py-2 text-xs font-medium" href="/calender" :active="request()->routeIs('calender*')">Calender</x-links.btn-primair>
