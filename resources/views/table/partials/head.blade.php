<thead class="table__head">
    <tr>

        @if ($table->options->get('sortable'))
        <th class="table__handle"></th>
        @endif

        @if ($table->actions->isNotEmpty())
        <th class="table__checkbox">
            <input type="checkbox">
        </th>
        @endif

        @foreach ($table->columns as $column)
        {{-- <th {!! html_attributes() !!}> --}}
        <th {!! $column->expandPrototypeAttribute('attributes')->htmlAttributes() !!}>

            @if ($column->sortable)
            <a href="{{ $column->href() }}">
                {!! $column->heading !!}
                @if ($column->direction == 'asc')
                {{-- {!! icon('sort-ascending') !!} --}}
                (ASC)
                @elseif ($column->direction == 'desc')
                {{-- {!! icon('sort-descending') !!} --}}
                (DESC)
                @else
                {{-- {!! icon('sortable') !!} --}}
                (--)
                @endif
            </a>
            @else
            {!! $column->heading !!}
            @endif
        </th>
        @endforeach

        <th></th>
    </tr>
</thead>
