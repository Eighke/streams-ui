<?php

namespace Streams\Ui\Form\Component\Field\Workflows;

use Streams\Core\Support\Workflow;
use Streams\Ui\Support\Workflows\BuildComponents;
use Streams\Ui\Support\Workflows\ParseComponents;
use Streams\Ui\Support\Workflows\ResolveComponents;
use Streams\Ui\Support\Workflows\TranslateComponents;
use Streams\Ui\Form\Component\Field\Workflows\Fields\DefaultFields;
use Streams\Ui\Form\Component\Field\Workflows\Fields\PopulateFields;
use Streams\Ui\Form\Component\Field\Workflows\Fields\NormalizeFields;

/**
 * Class BuildFields
 *
 * @link    http://pyrocms.com/
 * @author  PyroCMS, Inc. <support@pyrocms.com>
 * @author  Ryan Thompson <ryan@pyrocms.com>
 */
class BuildFields extends Workflow
{
    protected $steps = [
        //'resolve_fields' => ResolveComponents::class,

        DefaultFields::class,
        NormalizeFields::class,
        
        //'translate_fields' => TranslateComponents::class,
        //'parse_fields' => ParseComponents::class,

        'build_fields' => BuildComponents::class,

        'populate_fields' => PopulateFields::class,
    ];
}
