@if ($paginator->hasPages())
    <div class="pagination">
        @if ($paginator->currentPage() > 1)
            <a href="{{ $paginator->url(($paginator->currentPage() - 1)) }}"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a> &nbsp;
        @endif 
        <p> {{ $paginator->currentPage() }}</p>
        <p>@lang('front_main.from')</p>
        <p>{{ $paginator->lastPage() }}</p>
        
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        @endif
    </div>
@endif
