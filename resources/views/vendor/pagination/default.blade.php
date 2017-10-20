{{-- <ul class="pagination">
   <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
   <li class="active"><a href="#!">1</a></li>
   <li class="waves-effect"><a href="#!">2</a></li>
   <li class="waves-effect"><a href="#!">3</a></li>
   <li class="waves-effect"><a href="#!">4</a></li>
   <li class="waves-effect"><a href="#!">5</a></li>
   <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
 </ul> --}}
@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><i class="material-icons">chevron_left</i></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="material-icons">chevron_left</i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active green"><a>{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="material-icons">chevron_right</i></a></li>
        @else
            <li class="disabled"><i class="material-icons">chevron_right</i></li>
        @endif
    </ul>
@endif
