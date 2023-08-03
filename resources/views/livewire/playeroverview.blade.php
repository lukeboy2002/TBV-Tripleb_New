<div class="main col-span-full overflow-hidden">
    <div class="flex justify-between items center pb-8">
        <x-main-layout.heading>Player overview</x-main-layout.heading>
        {{ $players->links() }}
    </div>
    @foreach($players as $player)
        <x-card.player>
            <div class="sm:flex">
                <img src="{{ asset('storage/' . $player->image) }}" alt="{{ $player->username }}" class="h-full sm:h-80 sm:w-auto rounded-t-lg sm:rounded-t-none sm:rounded-tl-lg" >
                <div class="ml-4 py-8 w-full space-y-4 sm:space-y-6">
                    <div>
                        <p class="text-2xl font-black text-orange-500">{{ $player->username }}</p>
                        <p class="text-gray-700 dark:text-white text-sm">{{ $player->city }}</p>
                    </div>
                    <div class="flex justify-start gap-4 w-full text-sm text-gray-700 dark:text-white">
                        <div class="w-1/4">Age</div>
                        <div class="w-1/4">{{ $player->age() }}</div>
                        <div class="w-1/4">Points</div>
                        <div class="w-1/4">{{ $player->points }}</div>
                    </div>
                    <div class="flex justify-start gap-4 w-full text-sm text-gray-700 dark:text-white">
                        <div class="w-1/4">Played games</div>
                        <div class="w-1/4">{{ $player->played_games }}</div>
                        <div class="w-1/4">Games won</div>
                        <div class="w-1/4">{{ $player->won_games }}</div>
                    </div>
                </div>
            </div>

            @if( $player->bio )
            <div class="px-4 py-4 sm:py-6">
                <x-main-layout.heading>Biograpy</x-main-layout.heading>
                <div class="pt-4 text-gray-700 dark:text-white">
                    {!! $player->bio !!}
                </div>
            </div>
            @endif
        </x-card.player>
    @endforeach
</div>
