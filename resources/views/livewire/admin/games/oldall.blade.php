<div x-data="{}">
    <div class="mb-4 px-4 py-3 leading-normal text-blue-700 bg-blue-100 rounded-lg" role="alert">
        Click "Edit", modify that line data and click "Save".
    </div>
    <table class="table min-w-full">
        <thead>
        <tr>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Player</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Score</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Played Games</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider"></th>
        </tr>
        </thead>
        <tbody class="bg-white">
        @foreach ($players as $index => $player)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                    {{ $player['username'] }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                    @if ($editedPlayerIndex === $index || $editedPlayerField === $index . '.points')
                        <input type="text"
                               @click.away="$wire.editedPlayerField === '{{ $index }}.name' ? $wire.savePlayer({{ $index }}) : null"
                               wire:model.defer="players.{{ $index }}.points"
                               class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border w-full py-2 focus:outline-none focus:border-blue-400 {{ $errors->has('players.' . $index . '.points') ? 'border-red-500' : 'border-gray-400' }}"
                        />
                        @if ($errors->has('players.' . $index . '.points'))
                            <div class="text-red-500">{{ $errors->first('players.' . $index . '.points') }}</div>
                        @endif
                    @else
                        <div class="cursor-pointer" wire:click="editPlayerField({{ $index }}, 'name')">
                            {{ $player['points'] }}
                        </div>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                    @if ($editedPlayerIndex === $index || $editedPlayerField === $index . '.played_games')
                        <input type="text"
                               @click.away="$wire.editedPlayerField === '{{ $index }}.played_games' ? $wire.savePlayer({{ $index }}) : null"
                               wire:model.defer="players.{{ $index }}.played_games"
                               class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border w-full py-2 focus:outline-none focus:border-blue-400 {{ $errors->has('players.' . $index . '.played_games') ? 'border-red-500' : 'border-gray-400' }}"
                        />
                        @if ($errors->has('players.' . $index . '.played_games'))
                            <div class="text-red-500">{{ $errors->first('players.' . $index . '.played_games') }}</div>
                        @endif
                    @else
                        <div class="cursor-pointer" wire:click="editPlayerField({{ $index }}, 'played_games')">
                            {{ $player['played_games'] }}
                        </div>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                    @if($editedPlayerIndex === $index || (isset($editedPlayerField) && (int)(explode('.',$editedPlayerField)[0])===$index))
                        <button
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                            wire:click.prevent="savePlayer({{$index}})">
                            Save
                        </button>
                    @else
                        <button
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                            wire:click.prevent="editPlayer({{$index}})">
                            Edit
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
