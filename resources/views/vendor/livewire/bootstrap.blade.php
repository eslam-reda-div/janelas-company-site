@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp


@if ($paginator->hasPages())
    <ul>
        @if ($paginator->onFirstPage())
            <li aria-disabled="true" style="margin-bottom: 10px">
                <a type="button" class="page-numbers prev" style="cursor: not-allowed">
                    <span class="fa fa-angle-left"></span>
                </a>
            </li>
        @else
            <li  style="margin-bottom: 10px">
                <a style="cursor: pointer" type="button" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="page-numbers prev" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled">
                    <span class="fa fa-angle-left"></span>
                </a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li aria-disabled="true"  style="margin-bottom: 10px">
                    <span style="cursor: not-allowed" class="page-numbers current">{{ $element }}</span>
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li  style="margin-bottom: 10px" wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}" aria-current="page">
                            <span style="cursor: not-allowed" class="page-numbers current">{{ $page }}</span>
                        </li>
                    @else
                        <li  style="margin-bottom: 10px" wire:key="paginator-{{ $paginator->getPageName() }}-page-{{ $page }}">
                            <button type="button" class="page-numbers" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}">{{ $page }}</button>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li  style="margin-bottom: 10px">
                <a style="cursor: pointer" type="button" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}" class="page-numbers next" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled">
                    <span class="fa fa-angle-right"></span>
                </a>
            </li>
        @else
            <li aria-disabled="true"  style="margin-bottom: 10px">
                <a style="cursor: not-allowed" type="button" class="page-numbers next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </li>
        @endif
    </ul>

    <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
        <div>
            <p class="small text-muted">
                {!! __('Showing') !!}
                <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                {!! __('to') !!}
                <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                {!! __('of') !!}
                <span class="fw-semibold">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>
        </div>
    </div>
@endif
