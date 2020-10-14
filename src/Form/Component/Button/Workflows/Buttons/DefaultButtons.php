<?php

namespace Streams\Ui\Form\Component\Button\Workflows\Buttons;

use Streams\Ui\Form\FormBuilder;

/**
 * Class DefaultButtons
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class DefaultButtons
{

    /**
     * Handle the step.
     *
     * @param FormBuilder $builder
     */
    public function handle(FormBuilder $builder)
    {
        if ($builder->buttons) {
            return;
        }
    
        $builder->buttons = [
            'cancel',
        ];
    }
}
