<x-link.primary class="px-3 py-2 text-xs font-medium" href="/" :active="request()->routeIs('home')">Home</x-link.primary>
<x-link.primary class="px-3 py-2 text-xs font-medium" href="/team" :active="request()->routeIs('members')">Team</x-link.primary>
<x-link.primary class="px-3 py-2 text-xs font-medium" href="/posts" :active="request()->routeIs('post*')">Blog</x-link.primary>
<x-link.primary class="px-3 py-2 text-xs font-medium" href="/fotos" :active="request()->routeIs('foto*')">Album</x-link.primary>
<x-link.primary class="px-3 py-2 text-xs font-medium" href="/calender" :active="request()->routeIs('calender*')">Calender</x-link.primary>
