<?php

namespace Streams\Ui\Form\Component\Button\Guesser;

use Streams\Core\Addon\Module\Module;
use Streams\Core\Addon\Module\ModuleCollection;
use Streams\Ui\Button\ButtonRegistry;
use Streams\Ui\Form\FormBuilder;

/**
 * Class TextGuesser
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class TextGuesser
{

    /**
     * Guess the button from the hint.
     *
     * @param FormBuilder $builder
     */
    public static function guess(FormBuilder $builder)
    {
        $buttons = $builder->buttons;

        $module = app('module.collection')->active();

        /*
         * This will break if we can't figure
         * out what the active module is.
         */
        if (!$module instanceof Module) {
            return;
        }

        foreach ($buttons as &$button) {
            if (isset($button['text'])) {
                continue;
            }

            if (!isset($button['button'])) {
                continue;
            }

            $text = $module->getNamespace('button.' . $button['button']);

            if (!isset($button['text']) && trans()->has($text)) {
                $button['text'] = $text;
            }

            if (
                (!isset($button['text']) || !trans()->has($button['text']))
                && config('streams.system.lazy_translations')
            ) {
                $button['text'] = ucwords(humanize($button['button']));
            }

            if (!isset($button['text'])) {
                $button['text'] = $text;
            }
        }

        $builder->buttons = $buttons;
    }
}
