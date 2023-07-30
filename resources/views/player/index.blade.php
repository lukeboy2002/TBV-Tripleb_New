<x-app-layout>
    <div class="max-w-6xl mx-auto mt-8 mx-4 px-4">
        <div class="grid grid-cols-1 gap-x-8 gap-y-10 pb-12 md:grid-cols-3">

            <div class="grid grid-cols-1 sm:col-span-2">

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
                                                <td class="pb-2 text-sm font-sm text-gray-700 dark:text-white uppercase">Age</td>
                                                <td class="text-sm font-sm text-gray-700 dark:text-white pr-8">
                                                    {{ $player->age() }}
                                                </td>
                                                <td class="text-sm font-sm text-gray-700 dark:text-white uppercase">Points</td>
                                                <td class="text-sm font-sm text-gray-700 dark:text-white">
                                                    {{ $player->points }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-sm font-sm text-gray-700 dark:text-white uppercase">Played games</td>
                                                <td class="text-sm font-sm text-gray-700 dark:text-white pr-8">
                                                    {{ $player->played_games }}
                                                </td>
                                                <td class="text-sm font-sm text-gray-700 dark:text-white uppercase">Games won</td>
                                                <td class="text-sm font-sm text-gray-700 dark:text-white">
                                                    {{ $player->won_games }}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="px-6 py-6">
                                <x-main-layout.heading>Biograpy</x-main-layout.heading>
                                <div class="pt-4 text-gray-700 dark:text-white">
                                    {!! $player->bio !!}
                                </div>
                            </div>
                        </x-card.default>
                    @endforeach

                </div>

            </div>

            <div class="side">
                <x-main-layout.heading>Profile</x-main-layout.heading>
                <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>
            </div>
        </div>

    </div>
</x-app-layout>
