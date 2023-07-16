<div>
    @if (!$sponsors->isEmpty())
        <div class="overflow-x-auto relative shadow-md">
            <div class="flex justify-between items-center space-x-4 pb-4 pt-2 px-2">
                <div class="flex items-center">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input wire:model="search" type="text" name="search" id="search" class="pl-9 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500" placeholder="Search" required>
                    </div>
                </div>
                <div class="pr-2">
                    <x-link.btn-primary href="{{ route('admin.sponsors.create') }}" class="px-5 py-2.5 text-sm font-medium">New sponsor</x-link.btn-primary>
                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3"></th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                <button wire:click="sortBy('name')" class="uppercase">Name</button>
                                <x-icons.sort-icon
                                    field="name"
                                    :sortField="$sortField"
                                    :sortAsc="$sortAsc"
                                />
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            link
                        </th>
                        <th scope="col" class="px-6 py-3">
                            active
                        </th>
                        <th scope="col" class="px-6 py-3 flex justify-end space-x-4">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sponsors as $sponsor )
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img src="{{ asset('storage/' . $sponsor->image) }}" alt="{{ $sponsor->name }}" class="h-10 w-auto" >
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $sponsor->name }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <x-link.primary href="{{ $sponsor->link }}" target="_blank">{{ $sponsor->link }}</x-link.primary>
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if( $sponsor->active =='1' )
                                    <i class="fa-regular fa-circle-check text-green-600 fa-xl"></i>
                                @else
                                    <i class="fa-regular fa-circle-xmark text-red-700 fa-xl"></i>
                                @endif
                            </th>
                            <td class="px-6 py-4 flex justify-end space-x-4">
                                <x-link.btn-primary href="{{ route('admin.sponsors.edit' , $sponsor) }}" class="px-2.5 py-2.5 text-xs font-medium"><i class="fa-solid fa-pen-to-square"></i></x-link.btn-primary>
                                <x-button.danger type="button" wire:click="deleteId({{ $sponsor->id }})" class="px-2.5 py-2.5 text-xs font-medium"><i class="fa-solid fa-trash-can"></i></x-button.danger>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-4">
                {{ $sponsors->links() }}
            </div>
        </div>
    @else
        <div class="flex flex-col justify-center items-center h-40 space-y-4">
            <div class="text-orange-500"><i class="fa-regular fa-circle-xmark fa-2xl"></i></div>
            <p class="text-xl font-bold tracking-tight text-gray-700 dark:text-white">No records found</p>
        </div>
    @endif
    <!-- Modal -->
    <div class="hidden" @if ($showModal) style="display:block" @endif aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <x-modal.small>
            <div class="sm:flex sm:items-start">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gray-200 dark:bg-white sm:mx-0 sm:h-10 sm:w-10">
                        <i class="fa-solid fa-trash-can"></i>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-title">Delete Sponsor</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500 dark:text-gray-200 mb-3">
                                Make sure you want to do this.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full mt-5 sm:mt-4 flex justify-end space-x-2">
                <x-button.primary wire:click="close" class="px-3 py-2 text-xs font-medium" data-dismiss="modal">Close</x-button.primary>
                <x-button.danger wire:click.prevent="delete()" class="px-3 py-2 text-xs font-medium">Delete</x-button.danger>
            </div>
        </x-modal.small>
    </div>
</div>
