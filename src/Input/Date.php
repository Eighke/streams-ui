<?php

namespace Anomaly\Streams\Ui\Input;

use Anomaly\Streams\Ui\Support\Component;

/**
 * Class Date
 *
 * @link    http://pyrocms.com/
 * @author  PyroCMS, Inc. <support@pyrocms.com>
 * @author  Ryan Thompson <ryan@pyrocms.com>
 */
class Date extends Component
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
            'template' => 'ui::input/date',
            'component' => 'input',
            'classes' => ['input'],
        ], $attributes));
    }
}
