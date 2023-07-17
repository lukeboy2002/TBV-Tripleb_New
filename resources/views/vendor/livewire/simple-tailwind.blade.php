<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between space-x-2">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md select-none">
                        <i class="fa-solid fa-angle-left"></i>
                    </span>
                @else
                    @if(method_exists($paginator,'getCursorName'))
                        <button dusk="previousPage" wire:click="setPage('{{$paginator->previousCursor()->encode()}}','{{ $paginator->getCursorName() }}')" wire:loading.attr="disabled" class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:bg-orange-500 hover:text-white focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-orange-500 active:text-gray-700 transition ease-in-out duration-150">
                            <i class="fa-solid fa-angle-left"></i>
                        </button>
                    @else
                        <button wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:bg-orange-500 hover:text-white focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            <i class="fa-solid fa-angle-left"></i>
                        </button>
                    @endif
                @endif
            </span>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    @if(method_exists($paginator,'getCursorName'))
                        <button dusk="nextPage" wire:click="setPage('{{$paginator->nextCursor()->encode()}}','{{ $paginator->getCursorName() }}')" wire:loading.attr="disabled" class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:bg-orange-500 hover:text-white focus:outline-none focus:shadow-outline-blue focus:bg-orange-500 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            <i class="fa-solid fa-angle-right"></i>
                        </button>
                    @else
                        <button wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:bg-orange-500 hover:text-white focus:outline-none focus:shadow-outline-blue focus:bg-orange-500 active:bg-orange-500 active:text-gray-700 transition ease-in-out duration-150">
                            <i class="fa-solid fa-angle-right"></i>
                        </button>
                    @endif
                @else
                    <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md select-none">
                        <i class="fa-solid fa-angle-right"></i>
                    </span>
                @endif
            </span>
        </nav>
    @endif
</div>
