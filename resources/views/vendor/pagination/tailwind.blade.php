<div class="flex justify-between my-10">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="disabled">Previous</span>
        &nbsp;
        &nbsp;
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="text-blue-500 mr-4">Previous</a> <!-- Added margin -->
        &nbsp;
        &nbsp;
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    &nbsp;
                    &nbsp;
                    <span class="font-bold">{{ $page }}</span>
                    &nbsp;
                    &nbsp;
                @else
                    &nbsp;
                    &nbsp;
                    <a href="{{ $url }}" class="text-blue-500">{{ $page }}</a>
                    &nbsp;
                    &nbsp;
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        &nbsp;
        &nbsp;
        &nbsp;
        <a href="{{ $paginator->nextPageUrl() }}" class=" text-blue-500 ml-4">Next</a> <!-- Added margin -->
    @else
        &nbsp;
        &nbsp;
        &nbsp;
        <span class="disabled">Next</span>
    @endif
</div>
