@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center items-center space-x-1 mt-4">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-3 py-1 rounded border text-gray-400 cursor-not-allowed">«</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 rounded border text-gray-700 hover:bg-gray-100">«</a>
        @endif

        {{-- Pagination Number Links --}}
        @php
            $current = $paginator->currentPage();
            $last = $paginator->lastPage();
            $start = max(1, $current - 2);
            $end = min($last, $current + 1);
        @endphp

        @for ($page = $start; $page <= $end; $page++)
            @if ($page == $current)
                <span class="px-3 py-1 rounded border bg-yellow-500 text-black font-bold">{{ $page }}</span>
            @else
                <a href="{{ $paginator->url($page) }}" class="px-3 py-1 rounded border text-gray-700 hover:bg-gray-100">{{ $page }}</a>
            @endif
        @endfor

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 rounded border text-gray-700 hover:bg-gray-100">»</a>
        @else
            <span class="px-3 py-1 rounded border text-gray-400 cursor-not-allowed">»</span>
        @endif

    </nav>
@endif
