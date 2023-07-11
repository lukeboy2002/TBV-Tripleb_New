<ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-3 lg:grid-cols-6">
    <li>
        <div class="border-l-4 border-orange-500 pl-4 flex justify-between items-center">
            <div class="text-orange-500 hover:text-orange-600 font-black uppercase focus:outline-none focus:text-orange-600">
                Onze Sponsoren
            </div>
        </div>
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
