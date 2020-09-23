<?php

namespace Anomaly\Streams\Ui\Support\Workflows;

use Illuminate\Support\Arr;
use Anomaly\Streams\Ui\Support\Builder;

/**
 * Class MakeComponent
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class MakeComponent
{

    /**
     * Hand the step.
     *
     * @param Builder $builder
     */
    public function handle(Builder $builder)
    {
        $parameters = $builder->getPrototypeAttributes();
        
        $abstract = Arr::pull($parameters, $builder->component);
        
        $builder->{$builder->component} = new $abstract($parameters);
    }
}
