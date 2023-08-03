@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between space-x-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-2 text-xs font-medium text-white bg-orange-500 rounded-lg transition ease-in-out duration-150">
                <i class="fa-solid fa-angles-left"></i>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3 py-2 text-xs font-medium text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-600 transition ease-in-out duration-150">
                <i class="fa-solid fa-angles-left"></i>
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-2 text-xs font-medium text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-600 transition ease-in-out duration-150">
                <i class="fa-solid fa-angles-right"></i>
            </a>
        @else
            <span class="px-3 py-2 text-xs font-medium text-white bg-orange-500 rounded-lg transition ease-in-out duration-150">
                <i class="fa-solid fa-angles-right"></i>
            </span>
        @endif
    </nav>
@endif
