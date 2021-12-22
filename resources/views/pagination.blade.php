@if($paginator->hasPages())
    <nav>
        <ul class="pagination pull-right">
            {{-- Previous Page Link --}}
       
            @if ($paginator->onFirstPage())
            <a class="item-pagination flex-c-m trans-0-4">&lsaquo;</a>
            @else
                <a  href="{{ $paginator->previousPageUrl() }}" class="item-pagination flex-c-m trans-0-4">&lsaquo;</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                  <a href="{{ $paginator->url( $paginator->currentPage() - 5 ) }}" class="item-pagination flex-c-m trans-0-4">{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                             <a href="{{ $url }}" class="item-pagination flex-c-m trans-0-4 active-pagination">{{ $page }}</a>
                        @else
                             <a href="{{ $url }}" class="item-pagination flex-c-m trans-0-4">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                 <a href="{{ $paginator->nextPageUrl() }}" class="item-pagination flex-c-m trans-0-4">&rsaquo;</a>
            @else
                <a href="{{ $paginator->nextPageUrl() }}" class="item-pagination flex-c-m trans-0-4 disabled">&rsaquo;</a>
            @endif
        
        </ul>
    </nav>
@endif