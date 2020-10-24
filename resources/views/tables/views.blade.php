@if ($table->views->isNotEmpty())
<nav class="table__views">
    @foreach ($table->views as $view)
        
        <a {!! $view->htmlAttributes([
            'classes' => []
        ]) !!}>{{ $view->text }}
        
            @if ($view->label)
            <span class="{{ $view->context }}">
                {{ $view->label }}
            </span>
            @endif
        </a>
    @endforeach
</nav>
@endif
