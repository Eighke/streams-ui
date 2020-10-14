<?php

namespace Streams\Ui\Form\Component\Field\Guesser;

use Streams\Core\Assignment\Contract\AssignmentInterface;
use Streams\Core\Stream\Contract\StreamInterface;
use Streams\Ui\Form\FormBuilder;

/**
 * Class InstructionsGuesser
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class InstructionsGuesser
{

    /**
     * Guess the field instructions.
     *
     * @param FormBuilder $builder
     */
    public static function guess(FormBuilder $builder)
    {
        $fields = $builder->getFields();
        $stream = $builder->getFormStream();

        foreach ($fields as &$field) {

            /*
             * If the instructions are already set then use it.
             */
            if (isset($field['instructions'])) {
                continue;
            }

            /*
             * If we don't have a field then we
             * can not really guess anything here.
             */
            if (!isset($field['field'])) {
                continue;
            }

            /*
             * No stream means we can't
             * really do much here.
             */
            if (!$stream instanceof StreamInterface) {
                continue;
            }

            /**
             * Try stream specific instructions.
             */
            $instructions = $stream->location('field.' . $field['field'] . '.instructions.' . $stream->handle);

            if (!isset($field['instructions']) && trans()->has($instructions)) {
                $field['instructions'] = $instructions;
            }

            /**
             * Fallback to a general field instruction.
             */
            $instructions = $stream->location('field.' . $field['field'] . '.instructions');

            if (!isset($field['instructions']) && trans()->has($instructions)) {
                $field['instructions'] = $instructions;
            }
        }

        $builder->setFields($fields);
    }
}
