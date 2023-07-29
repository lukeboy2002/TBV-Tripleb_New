<div x-data="{}">
    <div class="overflow-x-auto relative">
        <div class="flex justify-end items-center p-2">
            <p class="text-orange-500">Click "Edit", modify that line data and click "Save".</p>
        </div>

        <div class="relative overflow-x-auto shadow-md">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3"></th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            <button wire:click="sortBy('username')" class="uppercase">Username</button>
                            <x-icons.sort-icon
                                field="username"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                            />
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            <button wire:click="sortBy('points')" class="uppercase">Points</button>
                            <x-icons.sort-icon
                                field="points"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                            />
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            <button wire:click="sortBy('played_games')" class="uppercase">Played Games</button>
                            <x-icons.sort-icon
                                field="played_games"
                                :sortField="$sortField"
                                :sortAsc="$sortAsc"
                            />
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 flex justify-end space-x-4">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($players as $index => $player)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="{{ asset('storage/' . $player['image']) }}" alt="{{ $player['username'] }}" class="h-12 w-12 rounded-full" >
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $player['username'] }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($editedPlayerIndex === $index || $editedPlayerField === $index . '.points')
                                <x-form.input type="text"
                                       @click.away="$wire.editedPlayerField === '{{ $index }}.name' ? $wire.savePlayer({{ $index }}) : null"
                                       wire:model.defer="players.{{ $index }}.points"
                                       class="{{ $errors->has('players.' . $index . '.points') ? 'border-red-500' : 'border-gray-400' }}"
                                />
                                @if ($errors->has('players.' . $index . '.points'))
                                    <div class="text-sm text-red-500">
                                        {{ $errors->first('players.' . $index . '.points') }}
                                    </div>
                                @endif
                            @else
                                <div class="cursor-pointer" wire:click="editPlayerField({{ $index }}, 'name')">
                                    {{ $player['points'] }}
                                </div>
                            @endif
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($editedPlayerIndex === $index || $editedPlayerField === $index . '.played_games')
                                <x-form.input type="text"
                                       @click.away="$wire.editedPlayerField === '{{ $index }}.played_games' ? $wire.savePlayer({{ $index }}) : null"
                                       wire:model.defer="players.{{ $index }}.played_games"
                                       class="{{ $errors->has('players.' . $index . '.played_games') ? 'border-red-500' : 'border-gray-400' }}"
                                />
                                @if ($errors->has('players.' . $index . '.played_games'))
                                    <div class="text-sm text-red-500">
                                        {{ $errors->first('players.' . $index . '.played_games') }}
                                    </div>
                                @endif
                            @else
                                <div class="cursor-pointer" wire:click="editPlayerField({{ $index }}, 'played_games')">
                                    {{ $player['played_games'] }}
                                </div>
                            @endif
                        </th>
                        <td class="px-6 py-4 flex justify-end space-x-4">
                            @if($editedPlayerIndex === $index || (isset($editedPlayerField) && (int)(explode('.',$editedPlayerField)[0])===$index))
                                <x-button.primary class="px-3 py-2 text-xs font-medium" wire:click.prevent="savePlayer({{$index}})">
                                    Save
                                </x-button.primary>
                            @else
                                <x-button.secondary class="px-3 py-2 text-xs font-medium" wire:click.prevent="editPlayer({{$index}})">
                                    Edit
                                </x-button.secondary>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

