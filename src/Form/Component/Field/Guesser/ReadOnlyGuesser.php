<?php

namespace Anomaly\Streams\Ui\Form\Component\Field\Guesser;

use Anomaly\Streams\Ui\Form\FormBuilder;

/**
 * Class ReadOnlyGuesser
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ReadOnlyGuesser
{

    /**
     * Guess the field instructions.
     *
     * @param FormBuilder $builder
     */
    public static function guess(FormBuilder $builder)
    {
        $fields = $builder->getFields();

        if (!$readOnly = $builder->isReadOnly()) {
            return;
        }

        foreach ($fields as &$field) {
            $field['readonly'] = $readOnly;
        }

        $builder->setFields($fields);
    }
}
