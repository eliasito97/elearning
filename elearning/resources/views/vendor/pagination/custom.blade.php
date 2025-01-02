@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Botón "Anterior" --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true">
                <span>←</span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">←</a>
            </li>
        @endif

        {{-- Enlaces a Páginas --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled" aria-disabled="true">
                    <span>{{ $element }}</span>
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page">
                            <span>{{ $page }}</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Botón "Siguiente" --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">→</a>
            </li>
        @else
            <li class="disabled" aria-disabled="true">
                <span>→</span>
            </li>
        @endif
    </ul>
@endif

<style>
    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination li a,
    .pagination li span {
        display: inline-block;
        padding: 10px 15px;
        color: #333;
        text-decoration: none;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .pagination li.active span {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .pagination li.disabled span {
        color: #999;
        pointer-events: none;
    }

</style>
