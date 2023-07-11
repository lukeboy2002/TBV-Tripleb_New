<x-links.dropdown class="block" href="/" :active="request()->routeIs('home')">Home</x-links.dropdown>
<x-links.dropdown class="block" href="/team" :active="request()->routeIs('members')">Team</x-links.dropdown>
<x-links.dropdown class="block" href="/posts" :active="request()->routeIs('post*')">Blog</x-links.dropdown>
<x-links.dropdown class="block" href="/albums" :active="request()->routeIs('albums.index')">Album</x-links.dropdown>
<x-links.dropdown class="block" href="/calender" :active="request()->routeIs('calender*')">Calender</x-links.dropdown>
