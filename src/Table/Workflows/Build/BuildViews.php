<?php

namespace Anomaly\Streams\Ui\Table\Workflows\Build;

use Anomaly\Streams\Ui\Table\TableBuilder;
use Anomaly\Streams\Ui\Support\Workflows\BuildChildren;

/**
 * Class BuildViews
 *
 * @link    http://pyrocms.com/
 * @author  PyroCMS, Inc. <support@pyrocms.com>
 * @author  Ryan Thompson <ryan@pyrocms.com>
 */
class BuildViews extends BuildChildren
{
    public function handle(TableBuilder $builder)
    {
        $this->build($builder, 'views');
    }
}
