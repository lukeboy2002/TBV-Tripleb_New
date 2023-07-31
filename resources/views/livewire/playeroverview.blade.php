                <div class="main col-span-full">
                    <div class="flex justify-between items center pb-8">
                        <x-main-layout.heading>Player overview</x-main-layout.heading>
                        {{ $players->links() }}
                    </div>
                    @foreach($players as $player)
                        <x-card.default class="p-0">
                            <div class="flex">
                                <img src="{{ asset('storage/' . $player->image) }}" alt="{{ $player->username }}" class="h-80 w-auto rounded-tl-lg" >
                                <div class="ml-8 pt-8 w-full space-y-6">
                                    <div>
                                        <p class="text-2xl font-black text-orange-500">{{ $player->username }}</p>
                                        <p class="text-gray-700 dark:text-white text-sm">{{ $player->city }}</p>
                                    </div>

                                    <div class="mr-6">
                                        <table class="min-w-full">
                                            <tbody>
                                            <tr>
                                                <td class="pb-2 text-sm font-sm text-gray-700 dark:text-white">Age</td>
                                                <td class="text-sm text-sm text-gray-700 dark:text-white pr-8">
                                                    {{ $player->age() }}
                                                </td>
                                                <td class="text-sm text-sm text-gray-700 dark:text-white ">Points</td>
                                                <td class="text-sm font-sm text-gray-700 dark:text-white">
                                                    {{ $player->points }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm text-sm text-gray-700 dark:text-white ">Played games</td>
                                                <td class="text-sm text-sm text-gray-700 dark:text-white pr-8">
                                                    {{ $player->played_games }}
                                                </td>
                                                <td class="text-sm text-sm text-gray-700 dark:text-white ">Games won</td>
                                                <td class="text-sm text-sm text-gray-700 dark:text-white">
                                                    {{ $player->won_games }}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @if( $player->bio )
                            <div class="px-6 py-6">
                                <x-main-layout.heading>Biograpy</x-main-layout.heading>
                                <div class="pt-4 text-gray-700 dark:text-white">
                                    {!! $player->bio !!}
                                </div>
                            </div>
                            @endif
                        </x-card.default>
                    @endforeach
                </div>
