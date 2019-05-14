@if ($paginator->hasPages())
<div class="pagination-wrapper" style="    text-align: center;">

    <ul class="pagination">
        @if ($paginator->onFirstPage())



        @else
        <li ><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i> Previous</a>
        </li>
        @endif
            @foreach ($elements as $element)
                @if (is_string($element))

                    <li class="disabled"><span>{{ $element }}</span></li>

                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                                <li class="active"><a href="{{ $url }}">{{ $page }} <span class="sr-only"></span></a></li>

                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
            @endforeach
            @if ($paginator->hasMorePages())

        <li><a href="{{ $paginator->nextPageUrl() }}">Next <i class="fa fa-angle-double-right"></i></a></li>
            @else



            @endif
    </ul>
</div>
@endif
