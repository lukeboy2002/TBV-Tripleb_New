<ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-3 lg:grid-cols-6">
    <li>
        <x-main-layout.heading>Onze Sponsors</x-main-layout.heading>
    </li>
    @foreach ($sponsors as $sponsor)
        <li>
            <a href="{{ $sponsor->link }}" target="_blank">
                <div class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-900 focus-within:ring-2 focus-within:ring-orange-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                    <img src="{{ asset('storage/' . $sponsor->image) }}" alt="{{ $sponsor->name }}" class="pointer-events-none object-fit group-hover:opacity-75" >
                </div>
            </a>
        </li>
    @endforeach
</ul>

