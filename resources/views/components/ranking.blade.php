<table class="w-full text-left">
    <thead>
    <tr>
        <th scope="col" class="py-3">
            <x-main-layout.heading>Ranking</x-main-layout.heading>
        </th>
        <th scope="col" class="px-6 py-3 flex justify-end space-x-4 text-orange-500">
            Points
        </th>
    </tr>
    </thead>
    <tbody class="text-sm">
    @foreach($players as $player )
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $player->username }}
            </th>
            <th scope="row" class="flex justify-end space-x-4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $player->points }}
            </th>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="flex justify-center items-center w-full py-4">
    <x-link.btn-secondary href="#" class="w-full px-3 py-2 text-xs font-medium">Show all</x-link.btn-secondary>
</div>
