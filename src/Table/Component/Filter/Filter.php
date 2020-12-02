<?php

namespace Streams\Ui\Table\Component\Filter;

use Streams\Ui\Support\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Streams\Ui\Table\Component\Filter\Query\GenericFilterQuery;

class Filter extends Component
{

    /**
     * Initialize the prototype.
     *
     * @param array $attributes
     * @return $this
     */
    protected function initializePrototype(array $attributes)
    {
        return parent::initializePrototype(array_merge([
            'component' => 'filter',
            'template' => 'ui::form.input',

            'handle' => null,
            'field' => null,
            'stream' => null,
            'prefix' => null,
            'column' => null,

            'placeholder' => null,

            'active' => false,
            'exact' => false,

            'query' => GenericFilterQuery::class,
        ], $attributes));
    }

    /**
     * @todo finish this
     * Get the filter input.
     *
     * @return null|string
     */
    public function input()
    {
        $attributes = ['field' => $this];

        $attributes['value'] = $this->value();
        $attributes['name'] = $this->inputName();

        $attributes = array_diff_key($this->getPrototypeAttributes(), array_flip([
            'classes',
            'template',
            'component',
        ]));

        //dd($attributes);

        return App::make('streams.input_types.' . ($this->input ?: 'input'), [
            'attributes' => $attributes,
        ]);
    }

    /**
     * Get the filter value.
     *
     * @return null|string
     */
    public function value()
    {
        return Request::get($this->inputName());
    }

    /**
     * Get the filter name.
     *
     * @return string
     */
    public function inputName()
    {
        return $this->prefix . /*'filter_' .*/ $this->handle;
    }
}
