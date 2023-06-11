@if ($paginator->hasPages())
    <div class="row justify-content-center">
        @if ($paginator->onFirstPage())
            <div class="col-1">
                <a class="btn btn-outline-secondary" tabindex="-1"><i class="bi bi-arrow-left"></i></a>
            </div>
        @else
            <div class="col-1">
                <a class="btn btn-secondary text-white" href="{{ $paginator->previousPageUrl() }}" tabindex="-1"><i
                        class="bi bi-arrow-left"></i></a>
            </div>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <div class="col-1">
                    <a class="btn btn-secondary disabled">{{ $element }}</a>
                </div>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="col-1">
                            <a class="btn btn-outline-secondary">{{ $page }}</a>
                        </div>
                    @else
                        <div class="col-1">
                            <a class="btn btn-secondary text-light" href="{{ $url }}">{{ $page }}</a>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <div class="col-1">
                <a class="btn btn-secondary text-light" href="{{ $paginator->nextPageUrl() }}" rel="next"><i
                        class="bi bi-arrow-right"></i></a>
            </div>
        @else
            <div class="col-1">
                <a class="btn btn-outline-secondary" href="{{ $paginator->nextPageUrl() }}" rel="next"><i
                        class="bi bi-arrow-right"></i></a>
            </div>
        @endif
    </div>
@endif
